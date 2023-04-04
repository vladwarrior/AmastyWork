<?php

namespace Amasty\UserName\Controller\UsernameForm;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Checkout\Model\Session;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Message\ManagerInterface;
use mysql_xdevapi\Exception;


class UsernameForm implements ActionInterface
{

    /**
     * @var ResultFactory
     */
    private $resultFactory;
    /**
     * @var ManagerInterface
     */
    private $messageManager;
    /**
     * @var Session
     */
    private $checkoutSession;
    /**
     * @var
     */
    private $productRepository;

    protected $resultRedirectFactory;

    /**
     * @param ResultFactory $resultFactory
     * @param ManagerInterface $messageManager
     * @param Session $checkoutSession
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(
        ResultFactory    $resultFactory,
        ManagerInterface $messageManager,
        Session          $checkoutSession,
        ProductRepositoryInterface $productRepository,
        \Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory
    )
    {
        $this->resultFactory = $resultFactory;
        $this->messageManager = $messageManager;

        $this->checkoutSession = $checkoutSession;
        $this->productRepository = $productRepository;
        $this->resultRedirectFactory = $resultRedirectFactory;
    }

    public function execute()
    {
        $qty = $_POST['qty'];
        $sku = $_POST['sku'];
        $quote = $this->checkoutSession->getQuote();

        if ($quote->getId()) {
            $quote->save();
        }

        try {
            $product = $this->productRepository->get($sku);
            if ($product->getId()) {
                if ($product->getData()['type_id'] == 'simple') {
                    if ($product->getData()['quantity_and_stock_status']['qty'] >= $qty) {
                        $quote->addProduct($product, $qty);
                        $this->messageManager->addSuccessMessage(__('Товар(-ы) успешно добавлен(-ы) в корзину'));
                    } else {
                        $this->messageManager->addErrorMessage(__('Нет достаточного qty'));
                    }
                } else {
                    $this->messageManager->addErrorMessage(__('Данный продукт не simple'));
                }
            } else {
                $this->messageManager->addErrorMessage(__('Такого продукта не существует'));
            }
        } catch (\Magento\Framework\Exception\NoSuchEntityException $e) {
            $this->messageManager->addErrorMessage(__('Такого продукта не существует'));
        }


        $result = $this->resultRedirectFactory->create();
        $result->setPath('*/username/username');
        return $result;
        //header('Location: http://localhost/mypage/username/username');
    }
}