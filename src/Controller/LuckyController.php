<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController
{
    /**
    * @var array  $primeNumbers - Array of first 50 prime numbers
    */
    private $primeNumbers;

    private function populatePrimes(): void
    {
        $numberToCheck = 0;
        $this->primeNumbers = array();

        while (count($this->primeNumbers) < 50) {
            $numberToCheck += 1;
            $numberDiv2 = $numberToCheck / 2;
            
            for ($i=3; $i <= $numberDiv2; $i++) {
                if ($numberToCheck == 1 || $numberToCheck == 2) {
                    array_push($this->primeNumbers, $numberToCheck);
                } elseif ($numberToCheck % $i == 0) {
                    array_push($this->primeNumbers, $numberToCheck); 
                }
            }
        }

    }

    #[Route('/lucky')]
    public function number(): Response
    {
        $this->populatePrimes();
        $number = random_int(0, 50);

        return new Response(
            '<html><body>Here I tried to generate the first 50 prime numbers, but my implementation requires more work so I will revisit this down the line.
            Your generated (propbably) non-prime number is '.$this->primeNumbers[$number].'
            <pre>All prime numbers are '.implode("\n ", $this->primeNumbers).'</pre></body></html>'
        );
    }



/*     #[Route("/api/lucky/number")]
    public function jsonNumber(): Response
    {
        $number = random_int(0, 100);

        $data = [
            'lucky-number' => $number,
            'lucky-message' => 'Hi there!',
        ];

        $response = new Response();
        $response->setContent(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    } */

}

