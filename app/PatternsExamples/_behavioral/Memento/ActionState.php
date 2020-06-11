<?php


namespace App\PatternsExamples\_behavioral\Memento;


class ActionState
{
    private $paymentTo;
    private $currencyTo;
    private $paymentFrom;
    private $currencyFrom;
    private $sum;
    private $accountFrom;
    private $accountTo;

    /**
     * @return mixed
     */
    public function getPaymentTo()
    {
        return $this->paymentTo;
    }

    /**
     * @param mixed $paymentTo
     */
    public function setPaymentTo($paymentTo): void
    {
        $this->paymentTo = $paymentTo;
    }

    /**
     * @return mixed
     */
    public function getCurrencyTo()
    {
        return $this->currencyTo;
    }

    /**
     * @param mixed $currencyTo
     */
    public function setCurrencyTo($currencyTo): void
    {
        $this->currencyTo = $currencyTo;
    }

    /**
     * @return mixed
     */
    public function getPaymentFrom()
    {
        return $this->paymentFrom;
    }

    /**
     * @param mixed $paymentFrom
     */
    public function setPaymentFrom($paymentFrom): void
    {
        $this->paymentFrom = $paymentFrom;
    }

    /**
     * @return mixed
     */
    public function getCurrencyFrom()
    {
        return $this->currencyFrom;
    }

    /**
     * @param mixed $currencyFrom
     */
    public function setCurrencyFrom($currencyFrom): void
    {
        $this->currencyFrom = $currencyFrom;
    }

    /**
     * @return mixed
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * @param mixed $sum
     */
    public function setSum($sum): void
    {
        $this->sum = $sum;
    }

    /**
     * @return mixed
     */
    public function getAccountFrom()
    {
        return $this->accountFrom;
    }

    /**
     * @param mixed $accountFrom
     */
    public function setAccountFrom($accountFrom): void
    {
        $this->accountFrom = $accountFrom;
    }

    /**
     * @return mixed
     */
    public function getAccountTo()
    {
        return $this->accountTo;
    }

    /**
     * @param mixed $accountTo
     */
    public function setAccountTo($accountTo): void
    {
        $this->accountTo = $accountTo;
    }


}
