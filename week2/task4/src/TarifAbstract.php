<?php
abstract class TarifAbstract implements TarifInterface
{

    protected $priceKm;
    protected $priceMin;
    protected $distance;
    protected $minutes;

    /** @var ServiceInterface[] */
    protected $services = [];

    public function __construct($distance, $minutes)//записать во внутренние переменные
    {
        $this->distance = $distance;
        $this->minutes = $minutes;
    }

    function countPrice(): int
    {
        $price = $this->distance * $this->priceKm + $this->minutes * $this->priceMin;
        if ($this->services) {
            foreach ($this->services as $service) {
                $service->apply($this, $price);
            }
        }
        return $price;
    }

    public function addService(ServiceInterface $service): TarifInterface
    {
        array_push($this->services, $service);
        return $this;
    }

    public function getMinutes(): int
    {
        return $this->minutes;
    }

    public function getDistance(): int
    {
        return $this->distance;
    }
}

