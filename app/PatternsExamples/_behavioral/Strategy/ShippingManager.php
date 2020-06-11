<?php


namespace App\PatternsExamples\_behavioral\Strategy;


class ShippingManager
{
    public function shipProduct($productOrder)
    {
        $shippingDetails = $productOrder->getShippingDetails();
        $shippingStrategy = null;

        switch ($shippingDetails->getMethod()) {
            case 'sea':
                $shippingStrategy = new SeaShipping();
                break;
            case 'train':
                $shippingStrategy = new TrainShipping();
                break;
            case 'truck':
                $shippingStrategy = new TruckShipping();
        }

        if ($shippingStrategy) {
            $shippingStrategy->ship($productOrder);
        }
    }
}
