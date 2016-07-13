<?php

namespace SigBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SiniuController extends Controller
{

    public function indexAction()
    {
        $title = 'Síníu';

        return $this->render('SigBundle:Home:home.html.twig', [
            'page' => [
                'title' => $title,
            ],
            'nav'  => [
                'title'    => $title,
                'subtitle' => 'Corporate Signature Manager'
            ]
        ]);
    }

    public function connectAction(Request $request)
    {
        return new Response("$email $password");
    }
}
