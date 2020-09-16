<?php


namespace Dragun\DeliveryDate\Controller\Frontend\Logick;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\JsonFactory;

class TransleteColletion extends Action
{
    /**
     * TransleteColletion constructor.
     * @param Context $context
     * @param JsonFactory $resultJsonFactory
     */
public function __construct(
    Context $context,
    JsonFactory $resultJsonFactory
) {
    parent::__construct($context);
    $this->resultJsonFactory = $resultJsonFactory;
}

/**
 * @return \Magento\Framework\Controller\Result\Json
 */
public function execute() {
    /** @var \Magento\Framework\Controller\Result\Json $result */
    $result = $this->resultJsonFactory->create();
    return $result->setData(['success' => true]);
}
}
