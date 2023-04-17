<?php

namespace Amasty\UserName\Model\ResourceModel\Wish;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function _construct(): void
    {
        $this->_init(
            \Amasty\UserName\Model\Wish::class,
            \Amasty\UserName\Model\ResourceModel\Wish::class,
        );
    }
}