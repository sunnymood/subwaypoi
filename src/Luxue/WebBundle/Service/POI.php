<?php
/**
 * Created by PhpStorm.
 * User: luxue
 * Date: 2015/6/24
 * Time: 14:33
 */
namespace Luxue\WebBundle\Service;

class POI
{

    private static $dsn = "mysql:host=localhost;dbname=mytest";//静态变量在类的内部用self::来引用
    private static $dbuser = "root";//在类的外部，用"类名::"来引用,或者用"对象名::",不能用"对象名->"
    private static $dbpassword = "";
    private $dbh;
    private $stmt;

    public function  getDbh()
    {
        return $this->dbh;
    }

    public function getStmt()
    {
        return $this->stmt;
    }

    public function getConn()
    {

        try {
            $dbh = new PDO(self::$dsn, self::$dbuser, self::$dbpassword, array(PDO::ATTR_PERSISTENT => true));
            echo "connected successfully!" . "<br>";
            $dbh->query("SET NAMES utf8");
            $this->dbh = $dbh;
            return $this->dbh;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            return 0;
        }

    }

    public function getSubwayCoordinate()
    {
        $this->dbh = $this->getConn();
        if (isset($this->dbh)) {
            $this->stmt = $this->dbh->prepare("select*from subwaycoordinate");
            $this->stmt->execute();
            $subwaystation = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            return $subwaystation;
        } else {
            echo "dbh变量未被设置";
            return 0;
        }
    }

    function curl_getSubwayStatioPosition($poi,$location,$radius)
    {
        //初始化，创建一个新的curl资源
        $ch = curl_init();
        //$ak="zhBo0S6b0PhKyhIKsKcoshe0";
        //$url = "http://api.map.baidu.com/place/v2/search?ak=zhBo0S6b0PhKyhIKsKcoshe0&output=json&query=地铁站&scope=1&page_size=20&page_num={$page_num}&region=北京";
        $url="http://api.map.baidu.com/place/v2/search?ak=zhBo0S6b0PhKyhIKsKcoshe0&output=json&query={$poi}&page_size=20&page_num=0&scope=1&location={$location}&radius={$radius}";

        //设置url和相应的选项
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($ch,CURLOPT_POST,1);//采用post方式
        //执行并获取html文档内容
        $output = curl_exec($ch);
        curl_close($ch);
        //$output为json数据，转化为数组
        $output_array = json_decode($output, true);
        return $output_array;
    }
}





