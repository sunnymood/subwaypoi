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
 * Class DateGetController
 * @package Luxue\WebBundle\Controller
 * @Route("/dataget")
 */
class DateGetController extends Controller
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
     * @Route("/getPOI")
     * @Template()
     */
    public function getPOIAction(){
        $name = 'luxue';
        $age = 26;
        $sex = 'man';
        $data = array('name'=>$name,'age'=>$age,'sex'=>$sex);
        return $this->render('@LuxueWeb/DateGet/getPOI.html.twig',$data);
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

    /**
     * @Route("stationTable")
     */
    public function stationTableAction(){
        //__DIR__为当前脚本所在目录的绝对路径，末尾没有'\'。不管是include once 还是fopen、file_get_contents
        //最好都使用__DIR__加上".\"(当前目录)、"..\"(上一级目录) 将路径参数转化为绝对路径
        $stationtable_json_string = file_get_contents(__DIR__.'\..\Pythonscript\transferpoi.json');
//        var_dump($stationtable_json_string);
        return new Response($stationtable_json_string);//直接返回一个response，内容为一个字符串
    }

    /**
     * @Route("normalStationTable")
     */
    public function normalStationTableAction(){
        //__DIR__为当前脚本所在目录的绝对路径，末尾没有'\'。不管是include once 还是fopen、file_get_contents
        //最好都使用__DIR__加上".\"(当前目录)、"..\"(上一级目录) 将路径参数转化为绝对路径
        $normalstationtable_json_string = file_get_contents(__DIR__.'\..\Pythonscript\normalpoi.json');
//        var_dump($stationtable_json_string);
        return new Response($normalstationtable_json_string);//直接返回一个response，内容为一个字符串
    }

}