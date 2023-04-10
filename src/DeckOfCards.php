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
        for ($i = 0; $i <= 52; $i++) {
            $card = new Card($i);
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
        foreach ($this->deck as $card) {
            array_push($values, $card->getAsString());
        }
        return implode(", ", $values);
    }
}
