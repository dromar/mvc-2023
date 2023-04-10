<?php

namespace App\Card;

class CardGraphic extends Card
{
    public function __construct(string $value = null)
    {
        if ($value) {
            $this->card = $this->cards[$value];
        }
        $this->card = null;
    }

    private $cards = array(
        "🂡",
        "🂢",
        "🂣",
        "🂤",
        "🂥",
        "🂦",
        "🂧",
        "🂨",
        "🂩",
        "🂪",
        "🂫",
        "🂬",
        "🂭",
        "🂮",
        "🂱",
        "🂲",
        "🂳",
        "🂴",
        "🂵",
        "🂶",
        "🂷",
        "🂸",
        "🂹",
        "🂺",
        "🂻",
        "🂼",
        "🂽",
        "🂾",
        "🃁",
        "🃂",
        "🃃",
        "🃄",
        "🃅",
        "🃆",
        "🃇",
        "🃈",
        "🃉",
        "🃊",
        "🃋",
        "🃌",
        "🃍",
        "🃎",
        "🃑",
        "🃒",
        "🃓",
        "🃔",
        "🃕",
        "🃖",
        "🃗",
        "🃘",
        "🃙",
        "🃚",
        "🃛",
        "🃜",
        "🃝",
        "🃞"
    );

    public function draw(): string
    {
        $this->card = $this->cards[random_int(0, 55)];
        return $this->card;
    }
}
