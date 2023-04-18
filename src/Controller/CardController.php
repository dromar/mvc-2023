<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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

    #[Route("/deck", name: "deck")]
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

    #[Route("/deck/shuffle", name: "shuffle")]
    public function shuffle(SessionInterface $session): Response
    {

        $deck = new DeckOfCards();
        $deck->populate();
        $deck->shuffle();
        $session->set("deck", $deck->getDeckArr());
        $data = [
            'deck' => $deck->getString(),
        ];

        return $this->render('card/deck.html.twig', $data);
    }

    #[Route("/deck/draw", name: "draw")]
    public function draw(
        SessionInterface $session
    ): Response
    {

        if (null !== $session->get("deck")) {
            $deck = new DeckOfCards($session->get("deck"));
        } else {
            $deck = new DeckOfCards();
            $deck->populate();
            $deck->shuffle();
        }
        $deckCard = $deck->draw();
        $session->set("deck", $deck->getDeckArr());
        $data = [
            'deck' => $deckCard,
            'cardsLeft' => $deck->length(),
        ];

        return $this->render('card/draw.html.twig', $data);
    }


    #[Route("/deck/draw/{num<\d+>}", name: "drawMany")]
    public function drawMany(int $num, SessionInterface $session): Response
    {

        if ($num > 99) {
            throw new \Exception("Can not draw more than 56 cards!");
        }

        if (null !== $session->get("deck")) {
            $deck = new DeckOfCards($session->get("deck"));
        } else {
            $deck = new DeckOfCards();
            $deck->populate();
            $deck->shuffle();
        }
        $deckCard = $deck->draw($num);
        $session->set("deck", $deck->getDeckArr());
        $data = [
            'deck' => $deckCard,
            'cardsLeft' => $deck->length(),
        ];

        return $this->render('card/draw.html.twig', $data);
    }

    #[Route("/deck/deal/{players<\d+>}/{cards<\d+>}", name: "players")]
    public function deal(int $players, int $cards, SessionInterface $session): Response
    {


        if (null !== $session->get("deck")) {
            $deck = new DeckOfCards($session->get("deck"));
        } else {
            $deck = new DeckOfCards();
            $deck->populate();
            $deck->shuffle();
        }

        $cardsArray = [];
        for ($i = 1; $i <= $players; $i++) {
            $cardsArray[$i] = $deck->draw($cards);
        }

        $session->set("deck", $deck->getDeckArr());
        $data = [
            'deck' => $cardsArray,
            'cardsLeft' => $deck->length(),
        ];

        return $this->render('card/deal.html.twig', $data);
    }

}
