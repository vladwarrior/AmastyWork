<?php

namespace Amasty\UserName\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Blacklist extends AbstractDb
{
    public function _construct()
    {
        $this->_init(
            'amasty_username_blacklist',
            'blacklist_id'
        );
    }
}