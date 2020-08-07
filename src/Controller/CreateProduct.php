<?php

namespace App\Controller;

use App\Entity\Product;

use Doctrine\DBAL\Types\FloatType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Image;

class CreateProduct extends AbstractController
{
    /**
     * @Route("/new")
     * */
    public function new(Request $request)
    {
// creates a task object and initializes some data for this example
        $product = new Product();


        $form = $this->createFormBuilder($product)
            ->add('Name', TextType::class,array('attr' => array('class' => 'form-control')))
            ->add('Description', TextType::class,array('attr' => array('class' => 'form-control')))
            ->add('Price', NumberType::class,array('attr' => array('class' => 'form-control')))
            ->add('Category', TextType::class,array('attr' => array('class' => 'form-control')))
            ->add('Seller', TextType::class,array('attr' => array('class' => 'form-control')))
//            ->add('Image', Image::class)

            ->add('save', SubmitType::class, [
                'label' => 'Create Product',
                'attr' => array('class' => 'btn btn-primary mt-3')
            ])
            ->getForm();


//        $form = $this->createFormBuilder($article)
//            ->add('title', TextType::class, array('attr' => array('class' => 'form-control')))
//            ->add('body', TextareaType::class, array(
//                'required' => false,
//                'attr' => array('class' => 'form-control')
//            ))
//            ->add('save', SubmitType::class, array(
//                'label' => 'Create',
//                'attr' => array('class' => 'btn btn-primary mt-3')
//            ))
//            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $product = $form->getData();


             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($product);
             $entityManager->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('new.html.twig', [
            'form' => $form->createView(),
        ]);
// ...
    }
}