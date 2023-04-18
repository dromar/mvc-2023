<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class LuckyControllerApi
{
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
