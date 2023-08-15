<?php
namespace Magelearn\DeliveryDate\Controller\Index;
use Magento\Framework\Controller\ResultFactory;
 
class postFranchisee extends \Magento\Backend\App\Action
{
    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
		$params = $this->request->getParams();
		echo '<pre>';
		print_r($params);
		echo 'Hello'; exit();
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $resultPage;
    }
}