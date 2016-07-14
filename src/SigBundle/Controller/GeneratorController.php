<?php

namespace SigBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GeneratorController extends Controller
{
    public function makeAction(Request $request)
    {
        ob_end_clean();

        // Get all the requests:
        return new Response('To be done.');
    }
}
