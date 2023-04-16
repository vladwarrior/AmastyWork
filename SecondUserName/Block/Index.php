<?php

namespace Amasty\SecondUserName\Block;

class Index extends \Amasty\UserName\Block\Index
{
    public function sayHiTo(string $name = ''): string
    {
        return 'Hi from override, ' . $name;
    }
}