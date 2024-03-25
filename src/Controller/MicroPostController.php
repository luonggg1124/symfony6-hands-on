<?php

namespace App\Controller;

use App\Entity\MicroPost;
use App\Repository\MicroPostRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MicroPostController extends AbstractController
{
    #[Route('/micro/post', name: 'app_micro_post')]
    public function index(MicroPostRepository $posts): Response
    {
        // $microPost = new MicroPost();
        // $microPost->setTitle('It comes from controller');
        // $microPost->setText('Hi!');
        // $microPost->setCreated(new DateTime());
        // $microPost = $posts->find(4);
        // $microPost->setTitle('Welcome in general');


        // $posts->remove($microPost,true);

        // dd($posts->findBy(['title' => 'Welcome to VietNam!']));
        dd($posts->findAll());
        return $this->render('micro_post/index.html.twig', [
            'posts' => $posts->findAll(),
        ]);
    }
    #[Route('/micro-post/{post}',name:'app_micro_post_show')]
    public function showOne(MicroPost $post): Response
    {
        // dd($post);
        return $this->render('micro_post/show.html.twig', [
            'post' => $post,
        ]);
    }
    #[Route('/micro-post',name:'app_micro_post_all')]
    public function showAll(MicroPostRepository $post): Response
    {
        return $this->render('micro_post/index.html.twig', [
            'posts' => $post->findAll(),
        ]);
       
    }
}
