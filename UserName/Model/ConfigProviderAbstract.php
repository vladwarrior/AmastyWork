<?php

namespace Amasty\UserName\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

abstract class ConfigProviderAbstract
{
    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @var String
     */
    protected $pathPrefix = "";

    public function __construct(ScopeConfigInterface $scopeConfig)
    {;
        $this->scopeConfig = $scopeConfig;
    }

    protected function getValue($path, $storeId = null, $scope = 'store')
    {
        return $this->scopeConfig->getValue($this->pathPrefix . $path, $scope, $storeId = null) ?: "";
    }

}