<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeighingController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage()
    {
        return new Response("ciao");
    }

    /**
     * @Route("/weighing/show/{id}", name="show_weighing")
     */
    public function show($id)
    {
        $details = [
            "belly: 105",
            "weight: 94",
            "leg: 80"
        ];

        dump($id, $this);

        return $this->render('weighing/show.html.twig', [
            "id" => $id,
            "details" => $details
        ]);
    }
}