<?php


class OctRoom extends Room
{
    private $seitenlänge;

    function __construct(string $name, float $preis, float $seitenlänge, string ... $zusatzausstattung)
    {
        parent::__construct($name, $preis, $zusatzausstattung);
        $this->seitenlänge = $seitenlänge;
    }

    public function berechneGrundfläche(){
        return $this->seitenlänge*$this->seitenlänge*(2+2*sqrt(2));
    }

    public function getSeitenlänge(): float
    {
        return $this->seitenlänge;
    }
}