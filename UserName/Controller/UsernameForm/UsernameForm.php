<?php

namespace Amasty\UserName\Controller\UsernameForm;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Checkout\Model\Session;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\Event\ManagerInterface as EventManager;


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

    /**
     * @var \Magento\Framework\Controller\Result\RedirectFactory
     */
    protected $resultRedirectFactory;
    private \Magento\Framework\App\RequestInterface $request;

    /**
     * @var EventManager
     */
    private EventManager $eventManager;


    public function __construct(
        EventManager $eventManager,
        ResultFactory    $resultFactory,
        ManagerInterface $messageManager,
        Session          $checkoutSession,
        ProductRepositoryInterface $productRepository,
        \Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory,
        \Magento\Framework\App\RequestInterface $request
    )
    {
        $this->eventManager = $eventManager;
        $this->resultFactory = $resultFactory;
        $this->messageManager = $messageManager;
        $this->checkoutSession = $checkoutSession;
        $this->productRepository = $productRepository;
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->request = $request;
    }

    public function execute()
    {

        $qty = $this->request->getParam('qty');
        $sku = $this->request->getParam('sku');;
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
//                        $this->eventManager->dispatch(
//                            'amasty_secondUserName_add_product_to_cart',
//                            ['product' => $product]);
                        if($qty > 1) {
                            $this->messageManager->addSuccessMessage(__('Товары успешно добавлены в корзину'));
                        } else {
                            $this->messageManager->addSuccessMessage(__('Товар успешно добавлен в корзину'));
                        }
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
    }
}