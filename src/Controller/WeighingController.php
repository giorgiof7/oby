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
    public function homepage()
    {
        $weighings = $this->entityManager->getRepository(Weighing::class)
            ->findBy([], ['date' => 'ASC']);

        return $this->render('homepage.html.twig', [
            "weighings" => $weighings
        ]);
    }

    /**
     * @Route("/weighing/show/{id}", name="show_weighing")
     * @throws \Exception
     */
    public function show($id)
    {
        $weighing = $this->entityManager->getRepository(Weighing::class)
            ->find($id);

        if(!$weighing) {
            throw $this->createNotFoundException(sprintf('no weighing found with the id %d', $id));
        }

        return $this->render('weighing/show.html.twig', [
            "weighing" => $weighing
        ]);
    }

    /**
     * @Route("/weighing/new", name="new_weighing")
     */
    public function new()
    {
        $weighing = new Weighing();

        $weighing->setDate(new \DateTime('now'))
            ->setArmCircumference(rand(80,200))
            ->setChestCircumference(rand(100,150))
            ->setHipsCircumference(rand(100,180))
            ->setThighCircumference(rand(70,90))
            ->setWaistCircumference(rand(150,155))
            ->setIsMilestone(rand(0,1))
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