<?php
class ServiceDriver implements ServiceInterface
{

    private $price;
    public function __construct($price) {
        $this->price = $price;
    }

    public function apply(TarifInterface $tarif, &$price)
    {
        $price += $this->price;
    }
}