<?php

namespace Amasty\SecondUserName\Plugin;


class ChangeName
{
    public function beforeSayHiTo(
        \Amasty\UserName\Block\Index $subject,
        string $name = ''
    ) {
        $name = 'Vasya';

        return $name;
    }

    public function aroundSayHiTo(
        \Amasty\UserName\Block\Index $subject,
        callable $proceed,
        string $name = ''
    ) {

        return 'Hello ' . $name;
    }
    public function afterSayHiTo(
        \Amasty\UserName\Block\Index $subject,
        $result
    ) {

        return $result . "! How are you?";
    }
}