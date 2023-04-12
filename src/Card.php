<?php

namespace App\Card;

class Card
{
    //implementera ändå en value, en suit, och en "representation" medlemsvariabel

    protected $card;
    protected $originalPlace;
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

    public function __construct(int $cardArrayPosition = null)
    {
        if (is_null($cardArrayPosition)) {
            $this->card = null;
        } else {
            $this->card = $this->cards[$cardArrayPosition];
            $this->originalPlace = $cardArrayPosition;
            var_dump($cardArrayPosition);
        }
    }

    public function draw(): string
    {
        $random = random_int(0,55);
        $this->card = $this->cards[random_int(0,55)];
        $this->originalPlace = $random;
        return $this->card;
    }

    public function getPosition(): int
    {
        return $this->originalPlace;
    }


    public function getAsString(): string
    {
        return "$this->card";
    }
}
