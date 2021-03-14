<?php


namespace App\Controller;


use App\Entity\Weighing;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\CacheInterface;

class WeighingController extends AbstractController
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
        $weighings = $this->entityManager->getRepository(Weighing::class)
            ->findAllMilestoneOrderedByNewest();

        return $this->render('homepage.html.twig', [
            "weighings" => $weighings
        ]);
    }

    /**
     * @Route("/weighing/show/{id}", name="show_weighing")
     * @param Weighing $weighing
     * @return Response
     */
    public function show(Weighing $weighing) :Response
    {

        return $this->render('weighing/show.html.twig', [
            "weighing" => $weighing
        ]);
    }

    /**
     * @Route("/weighing/new", name="new_weighing")
     */
    public function new(): Response
    {
        $weighing = new Weighing();

        $weighing->setArmCircumference(rand(80,200))
            ->setChestCircumference(rand(100,150))
            ->setHipsCircumference(rand(100,180))
            ->setThighCircumference(rand(70,90))
            ->setWaistCircumference(rand(150,155))
            ->setWeight(rand(900,1000)/10);

        $this->entityManager->persist($weighing);
        $this->entityManager->flush();

        $this->addFlash('success', 'Weighing successfully registered.');

        return new Response(sprintf(
            'Well hallo! The shiny new weight is id #%d, weight %d',
            $weighing->getId(),
            $weighing->getWeight()
        ));
    }
}