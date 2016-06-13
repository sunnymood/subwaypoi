<?php
/**
 * Created by PhpStorm.
 * User: luxue
 * Date: 2015/8/26
 * Time: 16:23
 */

namespace Luxue\WebBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DataViewController
 * @package Luxue\WebBundle\Controller
 * @Route("/dataview")
 */
class DataViewController extends Controller
{

    /**
     * @Route("/subwaynet")
     * @Template()
     */
    public function subwayNetAction(){

        return $this->render('@LuxueWeb/Default/subwayNet.html.twig',array());
    }

    /**
     * @Route("/xeq")
     */
    public function xeqDisplayAction(){
        return $this->render('@LuxueWeb/Default/images.html.twig',array());

    }

    /**
     * @Route("/zcl")
     */
    public function zclDisplayAction(){
        return $this->render('@LuxueWeb/Default/images.html.twig',array());

    }

    /**
     * @Route("/hdhz")
     */
    public function hdhzDisplayAction(){
        return $this->render('@LuxueWeb/Default/images.html.twig',array());

    }

    /**
     * @Route("/xzm")
     */
    public function xzmDisplayAction(){
        return $this->render('@LuxueWeb/Default/images.html.twig',array());

    }

    /**
     * @Route("/dd")
     */
    public function ddDisplayAction(){
        return $this->render('@LuxueWeb/Default/images.html.twig',array());

    }

    /**
     * @Route("/xd")
     */
    public function xdDisplayAction(){
        return $this->render('@LuxueWeb/Default/images.html.twig',array());

    }

    /**
     * @Route("/xwm")
     */
    public function xwmDisplayAction(){
        return $this->render('@LuxueWeb/Default/images.html.twig',array());

    }
}
