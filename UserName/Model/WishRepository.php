<?php

namespace Amasty\UserName\Model;

class WishRepository
{
    /**
     * @var WishFactory
     */
    private $wishFactory;

    /**
     * @var ResourceModel\Wish
     */
    private $wishResourse;
    public function __construct(
        \Amasty\UserName\Model\WishFactory $wishFactory,
        \Amasty\UserName\Model\ResourceModel\Wish $wishResourse
    ){
        $this->wishFactory = $wishFactory;
        $this->wishResourse = $wishResourse;
    }

    public function getById(int $id): \Amasty\UserName\Model\Wish
    {
        $wish = $this->wishFactory->create();
        $this->wishResourse->load(
            $wish,
            $id
        );

        return $wish;
    }

    public function deleteById(int $id): void
    {
        $wish = $this->getById($id);
        $this->wishResourse->delete($wish);
    }
}