<?php

namespace SigBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use SigBundle\Entity\Users;

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

    public function loginAction()
    {
        $title = 'Log in';
        $path = '/login';

        return $this->render('SigBundle:Form:form.html.twig', [
            'page' => [
                'title' => $title,
            ],
            'nav'  => [
                'active_path' => $path,
                'title'       => $title,
                'subtitle'    => 'Fill up this form to get the fun started!'
            ]
        ]);
    }

    public function connectAction(Request $request)
    {
        /*
         * Redirects to user dashboard
         * */
        $username = $request->get('username');
        $password = $request->get('password');

        $db = new Users;

        /*
         * Twig return settings:
         * */

        $title = 'Log in';
        $path = '/login';

        /*
         * 1. Check if user exists
         * 2. Yes: check password and login
         * 3. No: create user with given password
         * */
        if ($username == $db->getUsername($username)) {
            // User found, checking password:
            if (!is_null($db->getUsername($username)) && $password == $db->getPassword($password)) {
                //Log him in!
                return new Response('Logged in!');
            } else {
                // wrong password: ask him again
                $debug = [
                    $db->getUsername($username),
                    $username
                ];
                return $this->render('SigBundle:Form:form.html.twig', [
                    'flash' => [
                        'message' => "Username or Password not recognized.",
                        'debug' => $debug
                    ],
                    'page'  => [
                        'title' => $title,
                    ],
                    'nav'   => [
                        'active_path' => $path,
                        'title'       => $title,
                        'subtitle'    => 'Fill up this form to get the fun started!'
                    ]
                ]);
            }
        } else {
            // User not found: let's create him!

            $db->setUsername($username);
            $db->setPassword($password);

            return new Response("Hurra! user $username created.");

        }
    }
}
