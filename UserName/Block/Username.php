<?php

namespace Amasty\UserName\Block;

use Amasty\UserName\Model\ConfigProvider;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Username extends Template
{
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @var ConfigProvider
     */
    private $configProvider;

    public function __construct(
        ConfigProvider   $configProvider,
        Template\Context $context,
        array            $data = []
    )
    {
        parent::__construct($context, $data);
        $this->configProvider = $configProvider;
    }

    public function printHello(): string
    {
        return "Hello, World!";
    }

    public function getWelcomeText(): string
    {
        return $this->configProvider->getWelcomeText();
    }
}