<?php
/**
 * Created by PhpStorm.
 * User: luxue
 * Date: 2016/6/7
 * Time: 7:08
 */

namespace Luxue\WebBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DateResultController
 * @package Luxue\WebBundle\Controller
 * @Route("/dataresult")
 */
class DataResultController extends Controller
{
    /**
     * @Route("getClusterResult")
     */
    public function getClusterResultAction(){
        //__DIR__为当前脚本所在目录的绝对路径，末尾没有'\'。不管是include once 还是fopen、file_get_contents
        //最好都使用__DIR__加上".\"(当前目录)、"..\"(上一级目录) 将路径参数转化为绝对路径
        $clusterresulttable_json_string = file_get_contents(__DIR__.'\..\Pythonscript\clusterresult.json');
//        var_dump($stationtable_json_string);
        return new Response($clusterresulttable_json_string);//直接返回一个response，内容为一个字符串
    }
}