<?php
/**
 * Created by PhpStorm.
 * User: luxue
 * Date: 2015/8/26
 * Time: 16:23
 */

namespace Luxue\WebBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DataPredictController
 * @package Luxue\WebBundle\Controller
 * @Route("/datapredict")
 */
class DataPredictController extends Controller
{
    /**
     * @Route("/addline16")
     */
    public function addLine16Action(){
        return $this->render("@LuxueWeb/DataPredict/dataPredictAdd16.html.twig",array());
    }

    /**
     * @Route("/addline03")
     */
    public function addLine03Action(){
        return $this->render("@LuxueWeb/DataPredict/dataPredictAdd03.html.twig",array());
    }
}