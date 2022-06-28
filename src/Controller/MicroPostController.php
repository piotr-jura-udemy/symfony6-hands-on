<?php

namespace App\Controller;

use DateTime;
use App\Entity\MicroPost;
use App\Repository\MicroPostRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MicroPostController extends AbstractController
{
    #[Route('/micro-post', name: 'app_micro_post')]
    public function index(MicroPostRepository $posts): Response
    {
        // $microPost = new MicroPost();
        // $microPost->setTitle('It comes from controller');
        // $microPost->setText('Hi!');
        // $microPost->setCreated(new DateTime());

        // $microPost = $posts->find(7);
        // $posts->remove($microPost, true);

        // dd($posts->findBy(['title' => 'Welcome to US!']));
        return $this->render('micro_post/index.html.twig', [
            'controller_name' => 'MicroPostController',
        ]);
    }
}
