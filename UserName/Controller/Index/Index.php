<?php

namespace Amasty\UserName\Controller\Index;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Amasty\UserName\Model\WishFactory;
use Amasty\UserName\Model\ResourceModel\Wish;
use Amasty\UserName\Model\ResourceModel\Wish\CollectionFactory;
use Amasty\UserName\Model\WishRepository;

class Index implements ActionInterface
{
    /**
     * @var ResultFactory
     */
    private ResultFactory $resultFactory;
    /**
     * @var WishFactory
     */
    private WishFactory $wishFactory;
    /**
     * @var Wish
     */
    private Wish $wishResource;
    /**
     * @var
     */
    private CollectionFactory $collectionFactory;

    /**
     * @var WishRepository
     */
    private WishRepository $wishRepository;

    public function __construct(
        ResultFactory $resultFactory,
        WishFactory $wishFactory,
        Wish $wishResource,
        CollectionFactory $collectionFactory,
        WishRepository $wishRepository
    )
    {
        $this->resultFactory = $resultFactory;
        $this->wishFactory = $wishFactory;
        $this->wishResource = $wishResource;
        $this->collectionFactory = $collectionFactory;
        $this->wishRepository = $wishRepository;
    }

    public function execute()
    {
        $wish = $this->wishRepository->getById(2);
        echo $wish->getText() . ' ' . $wish->getDone();




//        $wishCollection = $this->collectionFactory->create();
//        $wishCollection->addFieldToFilter('done', ['eq'=>1]);
//
//        foreach ($wishCollection as $item) {
//            echo $item->getText();
//            echo '<br/>';
//        }

//        $wish2 = $this->wishFactory->create();
//        $this->wishResource->load(
//            $wish2,
//            1,
//            'wish_id'
//        );
//        echo $wish2->getText();
//        $wish2->setDone(1);
//        $this->wishResource->save($wish2);

//        $wish = $this->wishFactory->create();
//        $wish->setText('Хочу в Amasty!');
//        $this->wishResource->save($wish);

        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
