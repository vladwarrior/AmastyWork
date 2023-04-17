<?php

namespace Amasty\UserName\Model;

use Amasty\UserName\Model\ResourceModel\Blacklist;

class BlacklistRepository
{
    /**
     * @var Blacklist
     */
    private $blacklist;

    /**
     * @var BlacklistFactory
     */
    private \Amasty\UserName\Model\BlacklistFactory $blacklistFactory;

    public function __construct(
        Blacklist $resourceBlacklist,
        BlacklistFactory $blacklistFactory
    )
    {
        $this->blacklist = $resourceBlacklist;
        $this->blacklistFactory = $blacklistFactory;
    }

    public function getBySku($sku): \Amasty\UserName\Model\Blacklist
    {
        $blacklistSku = $this->blacklistFactory->create();
        $this->blacklist->load($blacklistSku, $sku, 'sku');
        return $blacklistSku;
    }
}