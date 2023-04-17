<?php

namespace Amasty\UserName\Model;

use Magento\Framework\Model\AbstractModel;

/**
 * Amasty Blacklist Model
 *
 * @method int getBlacklistId()
 * @method string getSku()
 * @method bool getQty()
 *
 */
class Blacklist extends AbstractModel
{
    public function _construct(): void
    {
        $this->_init(\Amasty\UserName\Model\ResourceModel\Blacklist::class);
    }

}