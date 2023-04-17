<?php

namespace Amasty\UserName\Model;

use Magento\Framework\Model\AbstractModel;

/**
 * Amasty Wish Model
 *
 * @method int getWishId()
 * @method string getText()
 * @method bool getDone()
 *
 */
class Wish extends AbstractModel
{
    public function _construct(): void
    {
        $this->_init(\Amasty\UserName\Model\ResourceModel\Wish::class);
    }
}