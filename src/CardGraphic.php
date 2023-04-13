<?php

namespace App\Card;

class CardGraphic extends Card
{
    public function __construct(int $cardArrayPosition = null)
    {
        if (is_null($cardArrayPosition)) {
            $this->card = null;
        } else {
            $this->card = $this->cards[$cardArrayPosition];
            $this->originalPlace = $cardArrayPosition;
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
