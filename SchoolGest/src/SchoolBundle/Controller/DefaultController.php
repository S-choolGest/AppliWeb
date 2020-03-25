<?php

namespace SchoolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@School/Default/index.html.twig');
    }

    public function frontAction()
    {
        return $this->render('@School/Default/index_front.html.twig');
    }

}
