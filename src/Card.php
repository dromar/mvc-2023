<?php

namespace App\Card;

class Card
{
    protected $value;
    protected $suit;
    public $card;

    private $cards = [
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
    ];

    public function __construct(int $value = null)
    {
        if (is_null($value)) {
            $this->card = null;
        } else {
            $this->card = $this->cards[$value];
        }
    }

    public function draw(): string
    {
        $this->card = $this->cards[random_int(0,55)];
        return $this->card;
    }


    public function getAsString(): string
    {
        return "$this->card";
    }
}
