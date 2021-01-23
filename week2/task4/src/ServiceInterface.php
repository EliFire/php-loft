<?php
interface ServiceInterface
{
    public function apply(TarifInterface $tarif, &$price);
}