<?php

namespace Amasty\UserName\Model;

class AmastyProvider implements \Amasty\UserName\Api\NameProviderInterface
{

    public function getName(): string
    {
        return "Amasty";
    }
}