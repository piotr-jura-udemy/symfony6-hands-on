<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Comment;
use App\Entity\MicroPost;
use App\Entity\UserProfile;
use App\Repository\MicroPostRepository;
use App\Repository\UserProfileRepository;
use DateTime;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloController extends AbstractController
{
  private array $messages = [
    ['message' => 'Hello', 'created' => '2022/06/12'],
    ['message' => 'Hi', 'created' => '2022/04/12'],
    ['message' => 'Bye!', 'created' => '2021/05/12']
  ];

  #[Route('/', name: 'app_index')]
  public function index(MicroPostRepository $posts): Response
  {
    $post = new MicroPost();
    $post->setTitle('Hello');
    $post->setText('Hello');
    $post->setCreated(new DateTime());

    $comment = new Comment();
    $comment->setText('Hello');
    // $comment->setPost($post);
    // $post->addComment($comment);
    $posts->add($post, true);

    // $user = new User();
    // $user->setEmail('email@email.com');
    // $user->setPassword('12345678');

    // $profile = new UserProfile();
    // $profile->setUser($user);
    // $profiles->add($profile, true);

    // $profile = $profiles->find(1);
    // $profiles->remove($profile, true);

    return $this->render(
      'hello/index.html.twig',
      [
        'messages' => $this->messages,
        'limit' => 3
      ]
    );
  }

  #[Route('/messages/{id<\d+>}', name: 'app_show_one')]
  public function showOne(int $id): Response
  {
    return $this->render(
      'hello/show_one.html.twig',
      [
        'message' => $this->messages[$id]
      ]
    );
    // return new Response($this->messages[$id]);
  }
}
