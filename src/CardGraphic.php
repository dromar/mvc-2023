<?php

namespace App\Card;

class CardGraphic extends Card
{

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
        $this->card = $this->cards[random_int(0,55)];
        return $this->card;
    }
}
