<?php

namespace App\Controller ;

use App\Entity\Product;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;


class ProductController extends AbstractController {

//   Main route
    /**
     * @Route("/",name="index")
     * */
    public function index()
    {
        $session = new Session();
        $session->start();
        if ($session->has('cart')) {
            $products = $session->get('cart');
        } //if it doesnt create the session and push a array for testing
        else{
            $cart = [];
            $session->set('cart',$cart);
        }
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
     * @Route("/shoppingCart", name="ShoppingCart")
     * */
    public function shopphingCart(Request $request){
        $session = $request->getSession();
        $cartItems = $session->get('cart');
        $cart=[];
//        var_dump($cartItems);
        foreach ($cartItems as $id=>$quantity){
            $product = $this->getDoctrine()->getRepository(Product::class)->find($id);
            array_push($cart,$product);
        }


        return $this->render('shoppingCart.html.twig',array('products'=>$cart));
    }

    /**
     * @route("/add")
     * */
    public function Add(Request $request){

        $session = $request->getSession();
        $cart = $session->get('cart',array());

        $id = $request->request->get('id');
        $quantity = $request->request->get('quantity');

        // something like [object] = quantity



        $cart[$id] = $quantity;

        if(isset($cart[$id])){
            $cart[$id] += $quantity;

        }else{
            $cart[$id] = $quantity;
        }

        $session->set('cart',$cart);

        return new Response();

    }

    /**
     * @Route("/remove/{id}", name="cart_remove")
     */
    public function Remove($id,Request $request){
        $session = $request->getSession();
        $cartItems = $session->get('cart',array());


        foreach ($cartItems as $productId=>$quantity){
            if($productId == $id){
                unset($cartItems[$id]);
                $session->set('cart',$cartItems);
            }
        }

//        return $this->redirectToRoute('shoppingCart');
            return new Response();

    }}

