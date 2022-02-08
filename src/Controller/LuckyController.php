<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LuckyController extends AbstractController
{
    /**
     * @Route("/lucky/number/{max}")
     */
    public function number($max = 100): Response
    {
        $number = random_int(0, $max);

        return $this->render('lucky/number.html.twig',
        ['number' => $number,]);
    }

    /**
     * @Route("/show/{age}", name="show_age", requirements={"age"="\d+"})
     */
    public function age(int $age): Response
    {
        return new Response("Usted tiene ".$age." años");
    }
    
    /**
     * @Route("/show/{name}", name="show_name")
     */
    public function name(string $name = "a sí mismo"): Response
    {
        return new Response("Usted se llama ".$name);
    }

    
}