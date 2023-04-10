<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Card\Card;
use App\Card\CardGraphic;
use App\Card\CardHand;

class CardController extends AbstractController
{

    #[Route("/card", name: "card")]
    public function report(): Response
    {
        $card = new Card();
        $cardGraphic = new CardGraphic();
        $card->draw();
        $cardGraphic->draw();
        $cardHand = new CardHand();
        $cardHand->add($card);
        $cardHand->add($cardGraphic);

        $data = [
            "card" => $card->draw(),
            "cardGraphic" => $cardGraphic->draw(),
            "cardHand" => $cardHand->getString(),

        ];


        return $this->render('card.html.twig', $data);
    }
}
