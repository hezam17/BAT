<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    #[Route(['/','/home'], name: 'app_home')]
    public function home(): Response
    {
        return $this->render('home/home.html.twig');
    }
    #[Route('/login', name: 'app_login')]
    public function login(): Response
    {
        return $this->render('Form/login.html.twig');
    }
    #[Route('/singin', name: 'app_singIn')]
    public function singin(): Response
    {
        return $this->render('Form/singin.html.twig');
    }
    #[Route('/register ', name: 'app_register ' , methods: ['POST' , 'GET'])]
    public function register (Request $request , UserRepository $userRepository): Response
    {
        $user = new User();
        $name = $request->query->get("username");
        $email = $request->query->get("email");
        $password = $request->query->get("password");
        $number = $request->query->get("number");
        $user->setUserName($name);
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setNumber($number);
        $userRepository->save($user , true);
        return $this->render('home/home.html.twig');
    }



}
