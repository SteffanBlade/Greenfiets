<?php

namespace App\Controller ;

use App\Entity\Product;
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


    /**
     * @Route("/category1",name="category1")
     * */
    public function Category1(){

        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();


        return $this->render('firstCategory.html.twig',[
            'products'=>$products
        ]);
    }
    /**
     * @Route("/shoppingCart")
     * */
    public function shopphingCart(){
        return $this->render('shoppingCart.html.twig');
    }
}