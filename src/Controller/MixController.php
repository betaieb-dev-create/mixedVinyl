<?php

namespace App\Controller;

use App\Entity\VinylMix; // Assurez-vous que le namespace est correct
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
class MixController extends AbstractController
{
    #[Route('/mix', name: 'app_mix')]
    public function new(EntityManagerInterface $entityManager): Response
    {
        $mix = new VinylMix();
        $mix->setTitle('Do you Remember... Phil Collins?!');
        $mix->setDescription('A pure mix of drummers turned singers!');
        $mix->setGenre('pop');
        $mix->setTrackCount(rand(5, 20));
        $mix->setVotes(rand(-50, 50));
        $entityManager->persist($mix);
        $entityManager->flush();
        
        dd($mix);
        
        return $this->render('mix/index.html.twig', [
            'controller_name' => 'MixController',
        ]);
    }
}
