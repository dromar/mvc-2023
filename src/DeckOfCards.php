<?php

namespace App\Card;

use App\Card\Card;

class DeckOfCards
{
    private $deck = array();

    public function __construct(array $deck = null)
    {
        if (isset($deck)) {
            $this->deck = $deck;
        }
    }
    public function add(Card $card): void
    {
        array_push($this->deck, $card);
    }

    public function populate(): void
    {
        for ($i = 0; $i <= 55; $i++) {
            $card = new CardGraphic($i);
            $this->add($card);
        }

    }

/*     public function getNumberDices(): int
    {
        return count($this->hand);
    }
 */
/*     public function getValues(): array
    {
        $values = [];
        foreach ($this->hand as $card) {
            $values[] = $card->getValue();
        }
        return $values;
    }
 */
    public function getString(): string
    {
        $values = [];
        foreach ($this->deck as $card1) {
            array_push($values, $card1->getAsString());
        }
        return implode(", ", $values);
    }

    public function sort(): void
    // kolla vilken suit kortet har, ??
    {
        usort($this->deck,function($first,$second){
            return $first->getPosition() > $second->getPosition();
        });
/*         $sorted = [];
        foreach ($this->deck as $card1) {
            $sorted[], $card1->getAsString());
        }
        return implode(", ", $values); */
    }

    public function shuffle(): void

    {   
        for ($i = 0; $i <= 50; $i++) {
            shuffle($this->deck);
        }
    }


    public function draw(int $cards = 1): String

    {   
        if ($cards == 1) {
            $tmpCard = array_pop($this->deck);
            return $tmpCard->getAsString();
        } else {
            $tmpCards = array_splice($this->deck,0,$cards);
            $values = [];
            foreach ($tmpCards as $card1) {
                array_push($values, $card1->getAsString());
            }
            return implode(", ", $values);
        }
    }

    public function length(): int
    {   
       return count($this->deck);
    }

}
