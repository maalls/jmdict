<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SearchController extends Controller
{

     /**
      * @Route("/")
      */
    public function index(Request $request, \Doctrine\Common\Persistence\ObjectManager $em)
    {

        $q = $request->query->get("q");
        $words = [];

        if($q) {

            $words = $em->getRepository(\App\Entity\Word::class)->findBy(["value" => $q]);

        }

        return $this->render('search/index.html.twig', ["q" => $q, "words" => $words]);

    }
}