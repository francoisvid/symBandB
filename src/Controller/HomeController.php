<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {


    /**
     * @Route("/hello/{prenom}", name="hello")
     * @Route("/hello/", name="hello")
     */
    public function hello($prenom = "") {
        return new Response("Salut " . $prenom);

    }

    /**
     * @Route("/", name="homepage")
     */
    public function home() {
        return $this->render('home.html.twig');
    }

}

?>