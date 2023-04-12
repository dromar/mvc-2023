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
}
