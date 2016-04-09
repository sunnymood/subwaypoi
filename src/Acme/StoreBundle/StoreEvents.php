<?php
/**
 * Created by PhpStorm.
 * User: luxue
 * Date: 2016/4/9
 * Time: 18:02
 */

namespace Acme\StoreBundle;


final class StoreEvents
{
    /**
     * store.order事件在每次订单被创建时抛出
     *
     * 监听该事件的监听者会接收到一个
     * Acme\StoreBundle\Event\FilterOrderEvent实例
     */
    /**
     * @var string
     */
    const STORE_ORDER = 'store_order';
}