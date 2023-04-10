<?php

namespace App\Card;

class Card
{
    protected $value;
    protected $suit;
    protected $card;
    private $suitTypes = array("♠","♥","♦","♣");
    private $cards = array(
        "1♠", 
        "2♠", 
        "3♠", 
        "4♠", 
        "5♠", 
        "6♠", 
        "7♠", 
        "8♠", 
        "9♠", 
        "10♠",
        "11♠",
        "12♠",
        "13♠",
        "14♠",
        "1♥", 
        "2♥", 
        "3♥", 
        "4♥", 
        "5♥", 
        "6♥", 
        "7♥", 
        "8♥", 
        "9♥", 
        "10♥",
        "11♥",
        "12♥",
        "13♥",
        "14♥",
        "1♦", 
        "2♦", 
        "3♦", 
        "4♦", 
        "5♦", 
        "6♦", 
        "7♦", 
        "8♦", 
        "9♦", 
        "10♦",
        "11♦",
        "12♦",
        "13♦",
        "14♦",
        "1♣",
        "2♣",
        "3♣",
        "4♣",
        "5♣",
        "6♣",
        "7♣",
        "8♣",
        "9♣",
        "10♣",
        "11♣",
        "12♣",
        "13♣",
        "14♣"
    );

    public function __construct(int $value = null)
    {
        if ($value) {
            $this->card = $this->cards[$value];
        }
        $this->card = null;
    }

    public function draw(): string
    {
        $this->card = $this->cards[random_int(0,55)];
        return $this->card;
    }


    public function getAsString(): string
    {
        return "{$this->card}";
    }
}
