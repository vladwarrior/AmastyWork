<?php

namespace Amasty\UserName\Block;

use Amasty\UserName\Api\NameProviderInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\Event\ManagerInterface as EventManager;


class Index extends Template
{
    /**
     * @var EventManager
     */
    private EventManager $eventManager;
    /**
     * @var NameProviderInterface
     */
    private NameProviderInterface $nameProvider;


    public function __construct(
        Template\Context $context,
        EventManager $eventManager,
        NameProviderInterface $nameProvider,
        array $data = []
    )
    {
        $this->eventManager = $eventManager;
        $this->nameProvider = $nameProvider;
        parent::__construct($context, $data);
    }

    public function sayHiTo(string $name = '')
    {
//        $this->eventManager->dispatch(
//            'amasty_username_check_name',
//            ['name_to_check' => $name]
//        );

        $name = $this->nameProvider->getName();

        return "Hi, $name!";
    }
}