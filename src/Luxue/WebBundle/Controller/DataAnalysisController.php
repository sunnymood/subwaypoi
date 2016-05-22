<?php

namespace Luxue\WebBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DataAnalysisController
 * @package Luxue\WebBundle\Controller
 * @Route("/dataana")
 */
class DataAnalysisController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }
}
