<?php

namespace Amasty\UserName\Model;

class ConfigProvider extends ConfigProviderAbstract
{
    /**
     * @var string
     */
    protected $pathPrefix = "test_config";
    const CONFIG_PATH_IS_ENABLED = '/general/enabled';
    const CONFIG_PATH_IS_SHOW_QTY_FIELD = '/general/hide';

    const CONFIG_PATH_WELCOME_TEXT = '/general/welcome_text';

    const CONFIG_PATH_QTY_NUMBER = '/general/qty_number';


    public function getIsEnabled($storeId = null)
    {
        return $this->getValue(self::CONFIG_PATH_IS_ENABLED, $storeId);
    }

    public function getIsShowQtyField($storeId = null)
    {
        return $this->getValue(self::CONFIG_PATH_IS_SHOW_QTY_FIELD, $storeId);
    }

    public function getWelcomeText($storeId = null)
    {
        return $this->getValue(self::CONFIG_PATH_WELCOME_TEXT, $storeId);
    }

    public function getQtyNumber($storeId = null)
    {
        return $this->getValue(self::CONFIG_PATH_QTY_NUMBER, $storeId);
    }
}