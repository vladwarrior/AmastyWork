<?php

namespace Amasty\UserName\Plugin;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Checkout\Controller\Cart\Add;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Message\ManagerInterface;

class AddProductPlugin
{
    /**
     * @var ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * @var ManagerInterface
     */
    protected $messageManager;

    /**
     * @var \Magento\Framework\Controller\Result\RedirectFactory
     */
    protected $resultRedirectFactory;
    public function __construct(
        ProductRepositoryInterface $productRepository,
        ManagerInterface $messageManager,
        \Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory
    )
    {
        $this->productRepository = $productRepository;
        $this->messageManager = $messageManager;
        $this->resultRedirectFactory = $resultRedirectFactory;
    }

    public function beforeExecute(Add $subject)
    {
        if (!$subject->getRequest()->getParam('product')) {
            try {
                $sku = (string)$subject->getRequest()->getParam('sku');
                $product = $this->productRepository->get($sku);
                $subject->getRequest()->setParams(['product' => $product->getId()]);
                $result = $this->resultRedirectFactory->create();
                $result->setPath('*/username/username');
                return $result;
            } catch (NoSuchEntityException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            }
        }
    }
}