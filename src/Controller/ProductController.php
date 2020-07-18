<?php

namespace App\Controller ;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController {

//   Main route
    /**
     * @Route("/",name="index")
     * */
    public function index()
    {
        return $this->render('Index.html.twig');
    }

}