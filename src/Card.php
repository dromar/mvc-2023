<?php

namespace App\Card;

class Card
{
    protected $value;
    protected $suit;
    protected $card;
    private $suitTypes = array("C","D","H","S");

    public function __construct()
    {
        $this->value = null;
        $this->suit = null;
        $this->card = null;
    }

    public function draw(): string
    {
        $this->value = random_int(1, 13);
        $this->suit = $this->suitTypes[random_int(0, 3)];
        $this->card = $this->suit . $this->value;
        return $this->card;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function getAsString(): string
    {
        return "[{$this->value}]";
    }
}
