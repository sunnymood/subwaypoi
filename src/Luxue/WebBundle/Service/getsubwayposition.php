<?
/**

 * 百度地图API函数，获取IP地址所在城市

 */

//function getJsonData($ip){
//
//    $key='xxx';
//
//    $jsondata_tmp=file_get_contents("http://api.map.baidu.com/location/ip?ak={$key}&ip={$ip}&coor=bd09ll");
//
//    return json_decode($jsondata_tmp, true);
//
//}


//获取北京地铁站点的坐标
function curl_getSubwayStatioPosition($page_num){
    //初始化，创建一个新的curl资源
    $ch=curl_init();
    //$ak="zhBo0S6b0PhKyhIKsKcoshe0";
    $url="http://api.map.baidu.com/place/v2/search?ak=zhBo0S6b0PhKyhIKsKcoshe0&output=json&query=地铁站&scope=1&page_size=20&page_num={$page_num}&region=北京";
    //设置url和相应的选项
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    //curl_setopt($ch,CURLOPT_POST,1);//采用post方式
    //执行并获取html文档内容
    $output=curl_exec($ch);
    curl_close($ch);
    //$output为json数据，转化为数组
    $output_array=json_decode($output,true);
    return $output_array;
}

$subwaystation=array();//新建一个数组，用来将每次http请求返回的所有数组 组合起来
$stationcount = 0;
for($page_num=0;$page_num<14;$page_num++) {

    $positionjsondata=curl_getSubwayStatioPosition($page_num);
    var_dump($positionjsondata);
    for($i=0;$i<count($positionjsondata['results']);$i++) {
        $subwaystation[$stationcount] = $positionjsondata['results'][$i];
        $stationcount++;//每当将结果数组的数据存入新数组中，stationcount加1
   }
}
echo count($subwaystation)."<br>";
//var_dump($subwaystation);//输出整合后的新数组
/*
for($i=0;$i<count($subwaystation);$i++){
    echo "站点名称： ".$subwaystation[$i]['name']."<br>"
    ."站点纬度： ".$subwaystation[$i]['location']['lat']."<br>"
        ."站点经度： ".$subwaystation[$i]['location']['lng']."<br>"
        ."站点所在线路： ".$subwaystation[$i]['address']."<br><br>";
}
*/
/**
 *将新数组插入数据库
 *
 */

    $dsn = "mysql:host=localhost;dbname=mytest";
    $dbuser = "root";
    $dbpassword = "root";
    try {
        $dbh = new PDO($dsn, $dbuser, $dbpassword, array(PDO::ATTR_PERSISTENT => true));
        echo "connected successfully!"."<br>";
        $dbh->query("SET NAMES utf8");
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }

/*
    if (isset($dbh)) {
        $stmt = $dbh->prepare("insert into subwaycoordinate (name,location_lat,location_lng,line)
                            VALUES (:name,:location_lat,:location_lng,:line) ");
        $stmt->bindParam(':name',$name);
        $stmt->bindParam(':location_lat',$lat);
        $stmt->bindParam(':location_lng',$lng);
        $stmt->bindParam(':line',$line);

        for($i=0;$i<count($subwaystation);$i++)
        {
            $name = $subwaystation[$i]['name'];
            $lat = $subwaystation[$i]['location']['lat'];
            $lng = $subwaystation[$i]['location']['lng'];
            $line = $subwaystation[$i]['address'];
            $stmt->execute();

        }

    }else
    {
        echo "dbh变量未被设置";
    }
*/
/**
 * 展示插入数据库中的数据
 */
$stmt_show = $dbh->prepare("select * from subwaycoordinate where line LIKE '%地铁4号线大兴线%'");
if($stmt_show->execute())
{
    while($row=$stmt_show->fetch(PDO::FETCH_ASSOC))
    {
        print_r($row);
        echo "<br>";
    }
}

?>



