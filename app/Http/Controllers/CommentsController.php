<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommentsHtmlService;
use App\Comment;
use App\Article;
use App\Question;
use Auth;
use Exception;

class CommentsController extends Controller
{
    const EXCEPTION_ENTITY_ID = 'Incorrect entity id!';
    const EXCEPTION_ENTITY_TYPE = 'Incorrect entity type!';
    const EXCEPTION_OFFSET = 'Incorrect offset!';
    const EXCEPTION_ENTITY_NOT_FOUND = 'No such entity!';
    const EXCEPTION_COMMENTS_NOT_FOUND = 'No comments loaded!';
    const EXCEPTION_COMMENTS_WRONG_TYPE = 'Comments were not passed as a proper collection!';
    const EXCEPTION_COMMENTS_NOT_RENDERED = 'No comments rendered!';
    const EXCEPTION_EMPTY_COMMENT = 'Comment body is empty!';

    // Массив сущностей, имеющих комменты
    private $types = [
        'article' => Article::class,
        'question' => Question::class,
    ];

    // Количество комментов для ajax подгрузки
    private $commentsLimit = 190;

    /**
     * Возвращает сущность
     */
    private function getEntity($entityType, $entityId)
    {
        $entity = '';
        $class = $this->types[$entityType] ?? '';

        // Получаем модель сущности
        if ($class) {
            $entity = $class::find($entityId);
        }

        return $entity;
    }

    /**
     * Load more comments for the article
     *
     * @param Request $request
     *
     * @return json object
     */
    public function getComments(Request $request)
    {
        $params = $request->all();
        $limit = $this->commentsLimit;
        $responseArray = [
            'success' => false,
            'errors' => '',
            'html' => '',
        ];

        try {
            // Берем параметры из запроса и прерываемся, если хоть один из них не передан или некорректен
            $entityId = (int) $params['id'] ?? '';
            $entityType = $params['type'] ?? '';
            $offset = (int) $params['offset'] ?? '';

            if (!is_int($entityId)) {
                throw new Exception(self::EXCEPTION_ENTITY_ID);
            }
            if (!$entityType) {
                throw new Exception(self::EXCEPTION_ENTITY_TYPE);
            }
            if (!is_int($offset)) {
                throw new Exception(self::EXCEPTION_OFFSET);
            }

            // Запрашиваем объект сущности и прерываемся, если он не передан
            $entity = $this->getEntity($entityType, $entityId);

            if (empty($entity)) {
                throw new Exception(self::EXCEPTION_ENTITY_NOT_FOUND);
            }

            // Запрашиваем комменты к сущности и прерываемся, если они не загружены или не являются коллекцией
            $comments = $entity->loadComments($offset, $limit);

            if (empty($comments)) {
                throw new Exception(self::EXCEPTION_COMMENTS_NOT_FOUND);
            }
            if (!is_a($comments, 'Illuminate\Database\Eloquent\Collection')) {
                throw new Exception(self::EXCEPTION_COMMENTS_WRONG_TYPE);
            }

            // Рендерим хтмл с комментами или прерываемся, если функция рендера ничего не вернула
            $html = CommentsHtmlService::renderComments($comments);

            if (empty($html)) {
                throw new Exception(self::EXCEPTION_COMMENTS_NOT_RENDERED);
            }

            // Формируем массив ответа
            $responseArray['success'] = true;
            $responseArray['html'] = $html;

        } catch(Exception $e) {
            $responseArray['errors'] = $e->getMessage();
        }

        return response()->json($responseArray);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->all();

        try {
            $entityId = (int) $params['entity_id'] ?? '';
            $entityType = $params['entity_type'] ?? '';
            $commentText = $params['text'];
            $isAjax = $params['is_ajax'] ?? false;

            // CommentCreatorService - Сервис, создающий комментарии.
            // В нем инстанцировать класс CommentCreatorResult, в него через сеттеры заносить результат, объект коммент, и тд.
            // Возвращать объект CommentCreatorResult.
            if (!is_int($entityId)) {
                throw new Exception(self::EXCEPTION_ENTITY_ID);
            }
            if (!$entityType) {
                throw new Exception(self::EXCEPTION_ENTITY_TYPE);
            }
            if (!$commentText) {
                throw new Exception(self::EXCEPTION_EMPTY_COMMENT);
            }

            // Запрашиваем объект сущности и прерываемся, если он не передан
            $entity = $this->getEntity($entityType, $entityId);

            if (empty($entity)) {
                throw new Exception(self::EXCEPTION_ENTITY_NOT_FOUND);
            }

            $comment = new Comment();
            $comment->text = $commentText;
            $comment->user()->associate(Auth::id());

            // Получаем модель сущности и сохраняем к ней коммент
            $entity->comments()->save($comment);
        } catch(Exception $e) {
            $error = $e->getMessage();
            // Вот здесь пока не сделал нормальную обработку ошибок
            return redirect()->back()->with(['error' => $error]);
        }

        if ($isAjax) {
            // Проверку вынести в renderComments, и если не массив, то загонять в массив
            $html = CommentsHtmlService::renderComments([$comment]);
            return response()->json($html);
        }

        return redirect()->route($entityType . '.show', $entity->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
