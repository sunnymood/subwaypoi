<?php
//正式版本的入口文件，相当于与一般php文件的index.php
use Symfony\Component\ClassLoader\ApcClassLoader;
use Symfony\Component\HttpFoundation\Request;

$loader = require_once __DIR__.'/../app/bootstrap.php.cache';//bootstrap的自加载文件，包括autoload

// Enable APC for autoloading to improve performance.
// You should change the ApcClassLoader first argument to a unique prefix
// in order to prevent cache key conflicts with other applications
// also using APC.
/*
$apcLoader = new ApcClassLoader(sha1(__FILE__), $loader);
$loader->unregister();
$apcLoader->register(true);
*/

require_once __DIR__.'/../app/AppKernel.php';//bundle的加载
//require_once __DIR__.'/../app/AppCache.php';

$kernel = new AppKernel('prod', false);
$kernel->loadClassCache();

//$kernel = new AppCache($kernel);

// When using the HttpCache, you need to call the method in your front controller instead of relying on the configuration parameter
//Request::enableHttpMethodParameterOverride();

//利用请求信息（$_GET $_POST $_SERVER等等）构造Request对象
$request = Request::createFromGlobals();

//Symfony2框架核心工作就是把Request对象转换成Response对象
$response = $kernel->handle($request);

//向客户端输出Response对象
$response->send();
$kernel->terminate($request, $response);
