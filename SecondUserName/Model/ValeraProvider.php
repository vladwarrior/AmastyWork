<?php

namespace Amasty\SecondUserName\Model;

use Amasty\UserName\Api\NameProviderInterface;

class ValeraProvider implements NameProviderInterface
{

    public function getName(): string
    {
       return 'Valeraa';
    }
}