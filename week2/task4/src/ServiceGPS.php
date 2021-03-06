<?php
class ServiceGPS implements ServiceInterface
{

    private $priceHour;
    public function __construct($priceHour) {
        $this->priceHour = $priceHour;
    }

    public function apply(TarifInterface $tarif, &$price)
    {
        $hours = ceil($tarif->getMinutes() / 60);
        $price = $this->priceHour * $hours;
    }
}