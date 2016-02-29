<?php
/**
 * Created by PhpStorm.
 * User: luxue
 * Date: 2015/8/20
 * Time: 9:12
 */

namespace Luxue\WebBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DateGetSelectionController
 * @package Luxue\WebBundle\Controller
 * @Route("/index")
 */
class DateGetSelectionController extends Controller
{
    /**
     * @Route("/getSubwayLines")
     */
    public function getSubwayLinesAction(){

        $em = $this->getDoctrine()->getManager();
        $subwaylines = $em->getRepository('LuxueWebBundle:SubwayLine')->findAll();
        //print_r($subwaylines);
        $subwaylineslist = array();//存放SubwayLine.id=>SubwayLine.linename 的数组

        /**
         * @var $subwayline \Luxue\WebBundle\Entity\SubwayLine
         */
        foreach($subwaylines as $subwayline){
            $subwaylineslist[$subwayline->getId()] = $subwayline->getLinename();
        };

        //var_dump($stations);
        //$subwaylines = json_encode(array('1号线','2号线','3号线'));
        return new Response(json_encode($subwaylineslist));

    }
    /**
     * @Route("/getStations/{linesname}")
     */
    public function getStationsAction($linesname){



        $em = $this->getDoctrine()->getEntityManager();
        $subwayline = $em->getRepository('LuxueWebBundle:SubwayLine')->findOneBy(array('linename'=>$linesname));
        $stations = $subwayline->getStations();//获得SubwayCoordinate 对象数组
        $subwaystationlist =array();//存放 SubwayCoordinate.id=>SubwayCoordinate.name 的数组
        foreach($stations as $station){
            $subwaystationlist[$station->getId()] = $station->getName();
        };

        return new Response(json_encode($subwaystationlist));

    }

    /**
     * @Route("/{stationname}")
     */
    public function getStationCoordinateAction($stationname){

        $em = $this->getDoctrine()->getEntityManager();
        $result = $em->getRepository('LuxueWebBundle:SubwayCoordinate')->findOneBy(array('name'=>$stationname));

        $stationcoordinate = array();
        $stationcoordinate['Lng'] = $result->getLocationLng();
        $stationcoordinate['Lat'] = $result->getLocationLat();
        $stationcoordinate['Radius'] = $result->getInfluenceRadius();


        return new Response(json_encode($stationcoordinate));
    }

    /**
     * @Route("/test")
     */
    public function getCoordinateAction(){

        $linesname = 'L01';
        $em = $this->getDoctrine()->getEntityManager();//若要使用createQueryBuilder() $em 必须要通过getEntityManager(),getManager()不行

        $qb = $em->createQueryBuilder();
        $qb->select('subwayLine')
            ->from('LuxueWebBundle:SubwayLine','subwayLine')
            ->where('subwayLine.id=:linesname')
            ->setParameter('linesname',$linesname);
        $query = $qb->getQuery();
        $result = $query->getSingleResult();//getSingleResult() 返回一个对象   getResult()则返回一个对象数组，数组中对象的个数可以是一个或多个

        $stats = $result->getStations();//得到一个arrayCollection对象

        /**
         * @var $stat \Luxue\WebBundle\Entity\SubwayCoordinate
         */
        foreach($stats as $stat){
            echo $stat->getName().$stat->getLocationLat().$stat->getLocationLng();
        }


    }


    public function serviceTestAction()
    {

    }

}