<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Card\Card;
use App\Card\CardGraphic;
use App\Card\CardHand;
use App\Card\DeckOfCards;

class CardController extends AbstractController
{

    #[Route("/card", name: "card")]
    public function report(): Response
    {


        return $this->render('card/landingpage.html.twig');
    }

    #[Route("/deck", name: "card")]
    public function deck(): Response
    {

        $deck = new DeckOfCards();
        $deck->populate();
        $deck->shuffle();
        $deckCard = $deck->draw(5);
        $data = [
            'deck' => $deckCard,
        ];

        return $this->render('card/deck.html.twig', $data);
    }

    #[Route("/deck/draw", name: "draw")]
    public function draw(): Response
    {

        $deck = new DeckOfCards();
        $deck->populate();
        $deck->shuffle();
        $deckCard = $deck->draw();
        $data = [
            'deck' => $deckCard,
            'cardsLeft' => $deck->length(),
        ];

        return $this->render('card/draw.html.twig', $data);
    }


    #[Route("/deck/draw/{num<\d+>}", name: "drawMany")]
    public function drawMany(int $num): Response
    {

        if ($num > 99) {
            throw new \Exception("Can not draw more than 56 cards!");
        }


        $deck = new DeckOfCards();
        $deck->populate();
        $deck->shuffle();
        $deckCard = $deck->draw($num);
        $data = [
            'deck' => $deckCard,
            'cardsLeft' => $deck->length(),
        ];

        return $this->render('card/draw.html.twig', $data);
    }
}
