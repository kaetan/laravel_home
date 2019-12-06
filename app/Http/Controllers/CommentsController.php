<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommentsHtmlService;
use App\Comment;
use App\Article;
use Auth;

class CommentsController extends Controller
{
    // Массив сущностей, имеющих комменты
    private $types = [
        'article' => Article::class,
        'question' => Question::class,
    ];

    /**
     * Возвращает класс сущности, для которой выполняются операции с комментами
     */
    private function defineEntity($entityType)
    {
        $class = $this->types[$entityType] ?? '';
        return $class;
    }

    /**
     * Load more comments for the article
     *
     * @param Request  $request
     *
     * @return json object
     */
    public function getComments(Request $request)
    {
        // Получаем айди и тип сущности из запроса, а так же оффсет для загрузки комментов
        $params = $request->all();
        // переделать - брать из парамс, сперва проверив наличие этих параметров. если не найден - ошибка
        $entityId = $request->id;
        $entityType = $request->type;
        $offset = $request->offset;

        // Получаем класс сущности
        $class = $this->defineEntity($entityType);
        if (empty($class)) {
            // массив возвращаемых результатов определить выше, ретерн должен быть один
            // весь метод обернуть в трай кэтч, в кэтч ошибки
            return response()->json(array('success' => false, 'html' => ''));
        }

        // Получаем модель сущности и загружаем её комменты
        // файндОрФейл убрать, если энтити пустой - ошибка
        $entity = $class::findOrFail($entityId);
        $limit = 10;
        $comments = $entity->loadComments($offset, $limit);

        // Генерируем хтмл с комментами и возвращаем его
        // назвать метод рендер()
        $html = CommentsHtmlService::getComments($comments);

        return response()->json(array('success' => true, 'html' => $html));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->text = $request->text;
        $comment->user()->associate(Auth::id());

        // Получаем класс сущности по ее типу
        $entityType = $request->entity_type;
        $class = $this->defineEntity($entityType);

        // Получаем модель сущности и сохраняем к ней коммент
        $entity = $class::findOrFail($request->entity_id);
        $entity->comments()->save($comment);

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
