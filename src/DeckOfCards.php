<?php

namespace App\Card;

use App\Card\Card;

class DeckOfCards
{
    private $deck = array();

    public function add(Card $card): void
    {
        array_push($this->deck, $card);
    }

    public function populate(): void
    {
        for ($i = 0; $i <= 55; $i++) {
            $card = new CardGraphic($i);
            var_dump($card->card);
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
            array_push($values, $card1->card);
        }
        return implode(", ", $values);
    }
}
