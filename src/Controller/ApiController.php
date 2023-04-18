<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Card\Card;
use App\Card\CardGraphic;
use App\Card\CardHand;
use App\Card\DeckOfCards;

class ApiController extends AbstractController
{

    #[Route("/api", name: "api-landing")]
    public function report(): Response
    {


        return $this->render('card/landingpage-api.html.twig');
    }

    #[Route("/api/deck", name: "api-deck", methods: ['GET'])]
    public function deck(
        SessionInterface $session
    ): Response
    {
        $deck = new DeckOfCards();
        $deck->populate();
        $data = [
            'deck' => $deck->getString(),
        ];

        // return new JsonResponse($data);

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }

    #[Route("/api/deck/shuffle", name: "api-shuffle", methods: ['GET'])]
    public function shuffle(
        SessionInterface $session
    ): Response
    {
        $deck = new DeckOfCards();
        $deck->populate();
        $deck->shuffle();
        $data = [
            'deck' => $deck->getString(),
        ];

        // return new JsonResponse($data);

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }
/*     #[Route("/api/deck/draw", name: "draw", methods: ['POST'])]
    public function save(
        SessionInterface $session
    ): Response
    {
        $roundTotal = $session->get("pig_round");
        $gameTotal = $session->get("pig_total");

        $session->set("pig_round", 0);
        $session->set("pig_total", $roundTotal + $gameTotal);

        return $this->redirectToRoute('pig_play');
    } */

/*     #[Route("/api/deck/draw/{number}", name: "shuffle", methods: ['POST'])]
    public function save(
        SessionInterface $session
    ): Response
    {
        $roundTotal = $session->get("pig_round");
        $gameTotal = $session->get("pig_total");

        $session->set("pig_round", 0);
        $session->set("pig_total", $roundTotal + $gameTotal);

        return $this->redirectToRoute('pig_play');
    } */

/*     #[Route("/api/deck/deal/", name: "shuffle", methods: ['POST'])]
    public function save(
        SessionInterface $session
    ): Response
    {
        $roundTotal = $session->get("pig_round");
        $gameTotal = $session->get("pig_total");

        $session->set("pig_round", 0);
        $session->set("pig_total", $roundTotal + $gameTotal);

        return $this->redirectToRoute('pig_play');
    } */
/* 
    #[Route("/api/deck", name: "deck", methods: ['GET'])]
    public function play(
        SessionInterface $session
    ): Response
    {
        $dicehand = $session->get("pig_dicehand");

        $data = [
            "pigDices" => $session->get("pig_dices"),
            "pigRound" => $session->get("pig_round"),
            "pigTotal" => $session->get("pig_total"),
            "diceValues" => $dicehand->getString() 
        ];

        return $this->render('pig/play.html.twig', $data);
    }
 */


    /**
     * @var array  $quoteLibrary Library of dumb success quotes
     */
    private $quoteLibrary;

    private function populateLibrary(): void
    {
        $this->quoteLibrary = array(
            "Det har ingen betydelse hur sakta du går bara du inte stannar.",
            "Det finns inga genvägar till någon plats värd att gå till.",
            "Var den förändring du vill se i världen.",
            "Du missar 100% av skotten du inte skjuter.",
            "Den största faran för de flesta av oss är inte att vårt mål är för högt och vi missar det, utan att det är för lågt och att vi når det.",
            "Den bästa tiden att plantera ett träd var för 20 år sedan. Den näst bästa tiden är nu.",
            "Du kan aldrig korsa havet innan du har modet att tappa sikten av land.",
            "Vad än sinnet kan uppfatta och tro, kan det uppnå.",
            "Lycka är inte något färdiggjort. Det kommer från dina egna handlingar.",
            "Kom alltid ihåg att ditt eget beslut att lyckas är viktigare än någonting annat."
        );
    }

    #[Route("/api/quote", name: "quote")]
    public function jsonQuote(): Response
    {
        $this->populateLibrary();
        $number = random_int(0, 9);

        $data = [
            'quote' => $this->quoteLibrary[$number],
            'today' => date('Y-m-d'),
            'timestamp' => date('Y-m-d\TH:m:s'),
        ];

        // return new JsonResponse($data);

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    } 

}
