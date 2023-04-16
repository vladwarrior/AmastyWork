<?php

namespace Amasty\SecondUserName\Plugin;

use Magento\Framework\View\Element\AbstractBlock;

class ChangeFormAction extends AbstractBlock
{
    public function afterGetFormAction(
        \Amasty\UserName\Block\UsernameForm $subject,
        $result
    ) {

        return $this->getUrl('checkout/cart/add/sku');
    }
}