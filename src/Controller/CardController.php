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
}
