<?php

namespace App\Card;

class Card
{
    protected $value;
    protected $suit;
    protected $card;
    private $suitTypes = array("♠","♥","♦","♣");


    public function __construct(string $value = null)
    {
        $this->value = $value;
        $this->card = null;
    }

    public function draw(): string
    {
        $this->value = random_int(1, 13);
        $this->card = $this->value . $this->suitTypes[random_int(0, 3)];
        return $this->card;
    }


    public function getAsString(): string
    {
        return "{$this->card}";
    }
}
