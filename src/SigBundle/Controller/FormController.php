<?php

namespace SigBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FormController extends Controller
{
    public function indexAction()
    {
        $title = 'Create your Signature!';
        $path = '/create';
        return $this->render('SigBundle:Form:form.html.twig', [
            'page' => [
                'title' => $title,
            ],
            'nav'  => [
                'active_path' => $path,
                'title'    => $title,
                'subtitle' => 'Fill up this form to get the fun started!'
            ]
        ]);
    }
}
