<?php
namespace Magelearn\DeliveryDate\Controller\Index;
use Magento\Framework\Controller\ResultFactory;
 
class PostPower extends \Magento\Backend\App\Action
{
    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $resultPage;
    }
}