<?php

namespace Amasty\UserName\Block;

use Magento\Framework\View\Element\Template;

class Index extends Template
{
    public function sayHiTo(string $name = '')
    {
        return "Hi, $name!";
    }
}