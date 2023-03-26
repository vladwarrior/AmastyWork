<?php

namespace Amasty\UserName\Controller\Username;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\ResultFactory;

class Username implements ActionInterface
{
    /**
     * @var ResultFactory
     */
    private $resultFactory;
    public function __construct(
        ResultFactory $resultFactory
    )
    {
        $this->resultFactory = $resultFactory;
    }

    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
