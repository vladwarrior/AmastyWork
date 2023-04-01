<?php

namespace Amasty\UserName\Controller\Username;

use Amasty\UserName\Model\ConfigProvider;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\TestFramework\Event\Magento;
use Magento\Checkout\Model\Session;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;

class Username implements ActionInterface
{
    /**
     * @var ResultFactory
     */
    private $resultFactory;
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;
    /**
     * @var
     */
    private $checkoutSession;
    /**
     * @var
     */
    private $productRepository;
    /**
     * @var
     */
    private $collectionFactory;

    /**
     * @param ResultFactory $resultFactory
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ResultFactory $resultFactory,
        ConfigProvider $configProvider,
        Session $checkoutSession,
        ProductRepositoryInterface $productRepository,
        CollectionFactory $collectionFactory
    )
    {
        $this->resultFactory = $resultFactory;
        $this->configProvider = $configProvider;
        $this->checkoutSession = $checkoutSession;
        $this->productRepository = $productRepository;
        $this->collectionFactory = $collectionFactory;
    }

    public function execute()
    {
//        $quote = $this->checkoutSession->getQuote();
//
//        if (!$quote->getId()) {
//            $quote->save();
//        }
//
//        $product = $this->productRepository->get('24-MB01');
//        $quote->addProduct($product, 1);
//        $quote->save();
//        die('done');


//        $productCollection = $this->collectionFactory->create();
//        $productCollection->addAttributeToFilter('sku', ['like' => '24-MB%']);
//        $productCollection->addAttributeToSelect('sku');
//
//        foreach ($productCollection as $product) {
//            echo $product->getSku();
//            echo '<br/>';
//        }
//        die('done');

        if($this->configProvider->getIsEnabled()) {
            return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        }
        die('Sorry, honey go home!');
    }
}
