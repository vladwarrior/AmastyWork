<?php

namespace Amasty\SecondUserName\Observer;

class CheckIsVasya implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer): void
    {
        $name = $observer->getData('name_to_check');

        if (strtolower($name) === 'vasya') {
            die("go home!");
        }
    }
}