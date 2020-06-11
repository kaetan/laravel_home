<?php


namespace App\PatternsExamples\_behavioral\ChainOfCommand;


class HowThisWorks
{
    public function handleBasicOrder($request)
    {
        $warehouseHandler = new WarehouseHandler();
        $paymentHandler = new PaymentHandler();
        $shippingHandler = new ShippingHandler();
        $finalHandler = new FinalHandler();

        $warehouseHandler->setNext($paymentHandler);
        $paymentHandler->setNext($shippingHandler);
        $shippingHandler->setNext($finalHandler);

        $handledRequest = $warehouseHandler->handle($request);
    }
}
