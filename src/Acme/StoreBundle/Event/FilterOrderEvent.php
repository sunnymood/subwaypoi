<?php
/**
 * Created by PhpStorm.
 * User: luxue
 * Date: 2016/4/9
 * Time: 18:14
 */

namespace Acme\StoreBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Acme\StoreBundle\Order;


class FilterOrderEvent extends Event
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function getOrder()
    {
        return $this->order;
    }
}

