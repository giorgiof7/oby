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
        return new Response("ciao");
    }

    /**
     * @Route("/weighing/show/{id}", name="show_weighing")
     * @throws \Exception
     */
    public function show($id)
    {
        $weighing = $this->entityManager->getRepository(Weighing::class)
            ->find($id);

        if($weighing) {

            $details = [
                "belly: ". $weighing->getWaistCircumference(),
                "weight: ". $weighing->getWeight(),
                "leg: ". $weighing->getThighCircumference()
            ];
            $stringifyDetails = join("|||", $details);

            $cachedDetails = $this->cache->get('details'.md5($stringifyDetails), function () use ($stringifyDetails){
                return $stringifyDetails;
            });
        } else {
            return $this->render('weighing/show.html.twig', [
               "id" => null,
               "details" => []
            ]);
        }



        return $this->render('weighing/show.html.twig', [
            "id" => $id,
            "details" => explode("|||", $cachedDetails)
        ]);
    }

    /**
     * @Route("/weighing/new", name="new_weighing")
     */
    public function new()
    {
        $weighing = new Weighing();

        $weighing->setDate(new \DateTime('now'))
            ->setArmCircumference(100)
            ->setChestCircumference(120)
            ->setHipsCircumference(200)
            ->setThighCircumference(80)
            ->setWaistCircumference(154)
            ->setIsMilestone(false)
            ->setWeight(98.8);

        $this->entityManager->persist($weighing);
        $this->entityManager->flush();

        return new Response(sprintf(
            'Well hallo! The shiny new question is id #%d, weight %d',
            $weighing->getId(),
            $weighing->getWeight()
        ));
    }
}