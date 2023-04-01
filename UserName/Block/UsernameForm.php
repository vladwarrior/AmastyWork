<?php

namespace Amasty\UserName\Block;

use Amasty\UserName\Model\ConfigProvider;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class UsernameForm extends Template
{
    /**
     * @var ConfigProvider
     */
    private $configProvider;

    /**
     * @param ConfigProvider $configProvider
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        ConfigProvider $configProvider,
        Template\Context $context,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->configProvider = $configProvider;
    }
    public function getQty()
    {
        return $this->configProvider->getQtyNumber();
    }
    public function getIsShowQty()
    {
        return $this->configProvider->getIsShowQtyField();
    }
}