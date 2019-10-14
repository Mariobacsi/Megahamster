<?php

namespace Mariobacsi\Megahamster\Living;
abstract class Room
{
    private $name;
    private $preis;
    private $zusatzausstattung;

    function __construct(string $name, float $preis, array $zusatzausstattung)
    {
        $this->name = $name;
        $this->preis = $preis;
        $this->zusatzausstattung = $zusatzausstattung;
    }

    public abstract function berechneGrundfläche();

    public function toListRow()
    {
        $flaeche = round($this->berechneGrundfläche(), 2);
        $ausruestung = implode(", ", $this->getZusatzausstattung());
        echo <<<ROOM
            <tr>
                <td>{$this->getName()}</td>
                <td>$flaeche</td>
                <td>{$this->getPreis()}</td>
                <td>$ausruestung</td>
            </tr>
        ROOM;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPreis()
    {
        return $this->preis;
    }

    public function getZusatzausstattung(): array
    {
        return $this->zusatzausstattung;
    }

    function __toString(): string
    {
        return $this->getName() . ' ' . $this->berechneGrundfläche() . ' ' . $this->getPreis() . '€';
    }
}
