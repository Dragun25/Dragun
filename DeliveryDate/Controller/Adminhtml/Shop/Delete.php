<?php
declare(strict_types=1);

namespace Dragun\DeliveryDate\Controller\Adminhtml\Shop;

class Delete extends \Dragun\DeliveryDate\Controller\Adminhtml\Shop
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('shop_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Dragun\DeliveryDate\Model\Shop::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Shop.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['shop_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Shop to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}

