<?php
class TarifHour extends TarifAbstract
{
    protected $priceKm = 0;
    protected $priceMin = 200 / 60;

    public function __construct($distance, $minutes)
    {
        parent::__construct($distance, $minutes);

        if ($this->minutes < 60) {
            $this->minutes = 60;
        } else {
            $rest = $this->minutes % 60;
            $this->minutes = $this->minutes - $rest + 60;
        }
    }
}