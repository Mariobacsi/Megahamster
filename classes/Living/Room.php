<?php

namespace Mariobacsi\Megahamster\Living;
abstract class Room implements \JsonSerializable
{
    private $name;
    private $preis;
    private $zusatzausstattung = ["Kalkleckstein"];

    function __construct(string $name, float $preis, array $zusatzausstattung)
    {
        $this->name = $name;
        $this->preis = $preis;
        foreach ($zusatzausstattung as $value) {
            array_push($this->zusatzausstattung, $value);
        }
    }

    public abstract function berechneGrundfläche();

    public function toListRow()
    {
        $flaeche = round($this->berechneGrundfläche(), 2);
        $ausruestung = implode(", ", $this->getZusatzausstattung());
        return <<<ROOM
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

    public function jsonSerialize():array
    {
        $rv['Name'] = $this->name;
        $rv['Grundfläche'] = $this->berechneGrundfläche();
        $rv['Preis'] = $this->preis;
        $rv['Zusatzausstattung'] = $this->zusatzausstattung;
        return $rv;
    }
}
