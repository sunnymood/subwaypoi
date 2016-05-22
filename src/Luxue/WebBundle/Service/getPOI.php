<?php
/**
 * Created by PhpStorm.
 * User: luxue
 * Date: 2015/7/2
 * Time: 19:38
 */

use Luxue\WebBundle\Service\POI;

$subwayPOI = new POI();
$subwaystationinfo = $subwayPOI->getSubwayCoordinate();
//var_dump($subwaystationinfo);

$location=array();//存放  站点名称=>站点坐标键值对、 影响半径radius、id

for($i=0;$i<count($subwaystationinfo);$i++) {
    $location[$i][$subwaystationinfo[$i]['name']] = $subwaystationinfo[$i]['location_lat']
        . ",".$subwaystationinfo[$i]['location_lng'];
    $location[$i]['id']=$subwaystationinfo[$i]['id'];
    $location[$i]['radius']=$subwaystationinfo[$i]['influence_radius'];
}
//var_dump($location);

$querystring=array(urlencode('政府机构'),urlencode('小区'),urlencode('旅游景点'),urlencode('写字楼'),urlencode('购物中心'),urlencode('医院'),urlencode('学校'));


$subwaystationPOIinfo=array();

for ($j = 0; $j < count($location); $j++) {
    $arraykey = array_keys($location[$j]);
    $subwaystationPOIinfo[$j]["name"] = $arraykey[0];
    $subwaystationPOIinfo[$j]['id']=$location[$j]['id'];
    for ($i = 0; $i < count($querystring); $i++) {
        $queryresult = $subwayPOI->curl_getSubwayStatioPosition($querystring[$i], urlencode($location[$j][$arraykey[0]]), urlencode($location[$j][$arraykey[2]]));
        $subwaystationPOIinfo[$j]['POI'][$i] = $queryresult['total'];
    }

}

//var_dump($subwaystationPOIinfo);


$dsn = "mysql:host=localhost;dbname=mytest";
$dbuser = "root";
$dbpassword = "";
try {
    $dbh = new PDO($dsn, $dbuser, $dbpassword, array(PDO::ATTR_PERSISTENT => true));
    echo "connected successfully!"."<br>";
    $dbh->query("SET NAMES utf8");
} catch (PDOException $exc) {
    echo $exc->getMessage();
}
if (isset($dbh)) {
    $stmt = $dbh->prepare("insert into subwaypoi (subwayStationName,id,governmentEntity_Number,community_Number,viewPoint_Number,officeBuilding_Number,shoppingMall_Number,hospital_Number,school_Number)
                            VALUES (?,?,?,?,?,?,?,?,?) ");
    $stmt->bindParam(1,$name);
    $stmt->bindParam(2,$id);
    $stmt->bindParam(3,$govnumber);
    $stmt->bindParam(4,$comnumber);
    $stmt->bindParam(5,$viewnumber);
    $stmt->bindParam(6,$officenumber);
    $stmt->bindParam(7,$shopnumber);
    $stmt->bindParam(8,$hospnumber);
    $stmt->bindParam(9,$schnumber);

    for($i=0;$i<count($subwaystationPOIinfo);$i++)
    {
        $name = $subwaystationPOIinfo[$i]['name'];
        $id = $subwaystationPOIinfo[$i]['id'];
        echo $subwaystationPOIinfo[$i]['id'];
        $govnumber = $subwaystationPOIinfo[$i]['POI'][0];
        $comnumber = $subwaystationPOIinfo[$i]['POI'][1];
        $viewnumber = $subwaystationPOIinfo[$i]['POI'][2];
        $officenumber = $subwaystationPOIinfo[$i]['POI'][3];
        $shopnumber = $subwaystationPOIinfo[$i]['POI'][4];
        $hospnumber= $subwaystationPOIinfo[$i]['POI'][5];
        $schnumber= $subwaystationPOIinfo[$i]['POI'][6];

        $stmt->execute();

    }

    echo '插入成功！'.'<br>';

}else
{
    echo "dbh变量未被设置";
}