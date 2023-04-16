<?php

namespace Amasty\UserName\Api;

interface NameProviderInterface
{
    public function getName(): string;
}