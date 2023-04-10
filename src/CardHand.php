<?php

namespace App\Card;

use App\Card\Card;

class CardHand
{
    private $hand = [];

    public function add(Card $card): void
    {
        $this->hand[] = $card;
    }

    public function draw(): void
    {
        foreach ($this->hand as $card) {
            $card->draw();
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
        foreach ($this->hand as $card) {
            array_push($values, $card->getAsString());
        }
        return implode(", ", $values);
    }
}
