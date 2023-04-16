<?php

namespace Amasty\UserName\Block;

use Amasty\UserName\Model\ConfigProvider;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\Event\ManagerInterface as EventManager;

class UsernameForm extends Template
{
    /**
     * @var ConfigProvider
     */
    private $configProvider;
    const FORM_ACTION = '/mypage/usernameform/usernameform';

    /**
     * @var EventManager
     */
    protected EventManager $eventManager;

    /**
     * @param ConfigProvider $configProvider
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        ConfigProvider $configProvider,
        Template\Context $context,
        EventManager $eventManager,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->configProvider = $configProvider;
        $this->eventManager = $eventManager;
    }
    public function getQty()
    {
        return $this->configProvider->getQtyNumber();
    }
    public function getIsShowQty()
    {
        return $this->configProvider->getIsShowQtyField();
    }

    public function addProductToCart($product)  //добавляем товар в корзину
    {
        $this->eventManager->dispatch('amasty_username_add_product_to_cart', ['product' => $product]);
    }
    public function getFormAction()
    {
        return self::FORM_ACTION;
    }
}