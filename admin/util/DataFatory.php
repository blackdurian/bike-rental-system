<?php

namespace admin\util;

use DataMonkey\Entity\Factory\AbstractFactory;
use admin\model\Admin;

class SimpleFactory extends AbstractFactory
{

    public function create($options = null)
    {
        return Admin::factory($options);
    }
}


?>