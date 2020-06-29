<?php


namespace App\Http\Controllers;


use App\Exceptions\MathsException;

class MathsController extends Controller
{
    /**
     * Константы арифметических операций
     */
    const CODE_SUM = 'sum',
        CODE_SUB = 'sub',
        CODE_MULT = 'mult',
        CODE_DIV = 'div';

    /**
     * Массив обязательных параметров
     * @var string[] $requiredParams
     */
    private $requiredParams = [
        'a',
        'b',
        'action',
    ];

    /**
     * Массив действий
     * @var string[] $actions
     */
    private $actions = [
        self::CODE_SUM,
        self::CODE_SUB,
        self::CODE_MULT,
        self::CODE_DIV,
    ];

    /**
     * Веб-интерфейс метода $this->doMath()
     *
     * @return float|int|mixed|string
     * @throws MathsException
     */
    public function doMathFromWeb()
    {
        $params = request()->all();
        return $this->doMath($params);
    }

    /**
     * Метод выполнения арифметических операций
     *
     * @param array $params
     * @return float|int|mixed|string
     * @throws MathsException
     */
    public function doMath(array $params)
    {
        $result = '';

        $this->validateParams($params);
        $a = $params['a'];
        $b = $params['b'];
        $action = $params['action'];

        switch ($action) {
            case self::CODE_SUM:
                $result = $a + $b;
                break;
            case self::CODE_SUB:
                $result = $a - $b;
                break;
            case self::CODE_MULT:
                $result = $a * $b;
                break;
            case self::CODE_DIV:
                if ($b == 0) {
                    throw new MathsException('Cannot divide by zero!');
                }
                $result = $a / $b;
                break;
        }

        return $result;
    }

    /**
     * Валидатор обязательных параметров
     *
     * @param $params
     * @throws MathsException
     */
    public function validateParams($params)
    {
        foreach ($this->requiredParams as $requiredParam) {
            if (!isset($params[$requiredParam])) {
                throw new MathsException('Parameter "' . $requiredParam . '" is missing!');
            }
        }

        if (!in_array($params['action'], $this->actions)) {
            throw new MathsException('Unknown action! Available actions: ' .
                self::CODE_SUM . ', ' .
                self::CODE_SUB . ', ' .
                self::CODE_MULT . ', ' .
                self::CODE_DIV . '.');
        }
    }
}
