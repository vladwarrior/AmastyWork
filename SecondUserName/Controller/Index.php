<?php

namespace Amasty\SecondUserName\Controller;

use Amasty\UserName\Model\ConfigProvider;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Customer\Model\Session;

class Index implements ActionInterface
{
    /**
     * @var ResultFactory
     */
    private ResultFactory $resultFactory;


    /**
     * @var Session
     */
    private Session $customerSession;
    /**
     *
     */
    private ConfigProvider $configProvider;


    public function __construct(
        ResultFactory $resultFactory,
        Session $customerSession,
        ConfigProvider $configProvider,
    ) {
        $this->resultFactory = $resultFactory;
        $this->customerSession = $customerSession;
        $this->configProvider = $configProvider;
    }

    public function execute()
    {
        if($this->configProvider->getIsEnabled()) {
            if ($this->customerSession->isLoggedIn()) {
                return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
            } else {
                die('Sorry, honey, firstly logged in!');
            }
        }
        die('Sorry, honey go home!');
    }
}