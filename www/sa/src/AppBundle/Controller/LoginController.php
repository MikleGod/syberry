<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     * @param Request $request
     * @param AuthenticationUtils $utils
     * @return Response
     */
    public function loginAction(Request $request, AuthenticationUtils $utils)
    {

        $errors = $utils->getLastAuthenticationError();

        $lastUserName = $utils->getLastUsername();

        return $this->render('@App/Login/login.html.twig', array(
            'errors' => $errors,
            'username' => $lastUserName
        ));
    }


    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction(){

    }

}
