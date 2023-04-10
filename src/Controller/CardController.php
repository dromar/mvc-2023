<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Card\Card;
use App\Card\CardGraphic;

class CardController extends AbstractController
{

    #[Route("/card", name: "card")]
    public function report(): Response
    {
        $card = new Card();
        $cardGraphic = new CardGraphic();

        $data = [
            "card" => $card->draw(),
            "cardGraphic" => $cardGraphic->draw(),

        ];


        return $this->render('card.html.twig', $data);
    }
}
