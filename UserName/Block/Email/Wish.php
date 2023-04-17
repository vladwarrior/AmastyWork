<?php

namespace Amasty\UserName\Block\Email;

use Magento\Framework\View\Element\Template;

class Wish extends Template
{
    private \Amasty\UserName\Model\WishRepository $wishRepository;


    public function __construct(
        Template\Context $context,
        \Amasty\UserName\Model\WishRepository $wishRepository,
        array $data = [])
    {
        $this->wishRepository = $wishRepository;
        parent::__construct($context, $data);
    }

    public function getWish(): \Amasty\UserName\Model\Wish
    {
        $wishId = $this->getData('wish_id');
        $wish = $this->wishRepository->getById($wishId);

        return $wish;
    }
}