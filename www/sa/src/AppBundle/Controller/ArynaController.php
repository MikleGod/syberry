<?php
/**
 * Created by PhpStorm.
 * User: miklegod
 * Date: 13.3.19
 * Time: 0.09
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArynaController extends Controller
{


    /**
     * @Route("/aryna")
     * @return Response
     */
    public function helloArynaAction() : Response
    {
        return new Response("Hello Aryna");
    }

}