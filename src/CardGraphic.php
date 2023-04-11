<?php

namespace App\Card;

class CardGraphic extends Card
{
    public function __construct(int $value = null)
    {
        if (is_null($value)) {
            $this->card = null;
        } else {
            $this->card = $this->cards[$value];
        }
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

}
