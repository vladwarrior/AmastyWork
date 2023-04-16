<?php

namespace Amasty\SecondUserName\Observer;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Checkout\Model\Session;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class AddPromoProduct implements ObserverInterface
{
    public const FOR_SKU = 'amasty_secondusername/for_sku';
    public const PROMO_SKU = 'amasty_secondusername/promo_sku';

    /**
     * @var Session
     */
    private $checkoutSession;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        Session                    $checkoutSession,
        ScopeConfigInterface       $scopeConfig
    )
    {
        $this->checkoutSession = $checkoutSession;
        $this->productRepository = $productRepository;
        $this->scopeConfig = $scopeConfig;
    }

    public function execute(Observer $observer)
    {
        $promoSku = $this->scopeConfig->getValue(self::PROMO_SKU);
        $forSku = $this->scopeConfig->getValue(self::FOR_SKU);
        $currentSku = $observer->getProduct()->getSku();

        if (str_contains($forSku['for_sku'], $currentSku)) {
            $product = $this->productRepository->get($promoSku['promo_sku']);
            $quote = $this->checkoutSession->getQuote();

            if (!$quote->getId()) {
                $quote->save();
            }

            $quote->addProduct($product, 1);
            $quote->save();
        }
    }
}