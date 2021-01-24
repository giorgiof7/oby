<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\CacheInterface;

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
     * @throws \Exception
     */
    public function show($id, CacheInterface $cache)
    {
        $details = [
            "belly: 105",
            "weight: 94",
            "leg: 80"
        ];
        $stringifyDetails = join("|||", $details);

        $cachedDetails = $cache->get('details'.md5($stringifyDetails), function () use ($stringifyDetails){
            return $stringifyDetails;
        });

        return $this->render('weighing/show.html.twig', [
            "id" => $id,
            "details" => explode("|||", $cachedDetails)
        ]);
    }
}