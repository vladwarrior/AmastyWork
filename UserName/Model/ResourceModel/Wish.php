<?php

namespace Amasty\UserName\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Wish extends AbstractDb
{

    public function _construct(): void
    {
        $this->_init(
            'amasty_wishes',
            'wish_id'
        );
    }
}