<?php

namespace Amasty\UserName\Controller\UsernameForm;

use Magento\Framework\App\Action\Context;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\App\RequestInterface;

class SearchProduct extends \Magento\Framework\App\Action\Action
{
    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var JsonFactory
     */
    protected $resultJsonFactory;
    private RequestInterface $request;

    public function __construct(
        Context $context,
        CollectionFactory $collectionFactory,
        JsonFactory $resultJsonFactory,
        RequestInterface $request
    ) {
        $this->request = $request;
        $this->collectionFactory = $collectionFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        parent::__construct($context);
    }

    public function execute()
    {

        $alias = $this->request->getParam('search_text');

        $collection = $this->collectionFactory->create()
            ->addAttributeToSelect('sku')
            ->addAttributeToSelect('name')
            ->addAttributeToFilter('sku', ['like' => "$alias" . '%'])
            ->setPageSize(5);

        $results = [];
        foreach ($collection->getItems() as $prod) {
            $results[] = [
                'sku' => $prod->getSku(),
                'name' => $prod->getName()
            ];
        }

        return $this->resultJsonFactory->create()->setData($results);
    }
}