<?php


namespace App\Controller;


use App\Entity\Weighting;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\CacheInterface;

class WeightingController extends AbstractController
{
    private $entityManager;
    private $cache;

    public function __construct(EntityManagerInterface $entityManager, CacheInterface $cache)
    {
        $this->entityManager = $entityManager;
        $this->cache = $cache;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function homepage(): Response
    {
        $weightings = $this->entityManager->getRepository(Weighting::class)
            ->findAllMilestoneOrderedByNewest();

        return $this->render('homepage.html.twig', [
            "weightings" => $weightings
        ]);
    }

    /**
     * @Route("/weighting/show/{id}", name="show_weighting")
     * @param Weighting $weighting
     * @return Response
     */
    public function show(Weighting $weighting) :Response
    {

        return $this->render('weighting/show.html.twig', [
            "weighting" => $weighting
        ]);
    }

    /**
     * @Route("/weighting/new", name="new_weighting")
     */
    public function new(): Response
    {
        $this->addFlash('success', 'Weighting successfully registered.');

        return new Response('Future feature');
    }
}