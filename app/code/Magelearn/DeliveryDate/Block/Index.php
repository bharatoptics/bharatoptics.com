<?php
namespace Magelearn\DeliveryDate\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;

class Index extends Template 
{
	/* public function __construct(Context $context, array $data = []) {
        parent::__construct($context, $data);
    } * /
    public function getFormAction()
    {
        return $this->getUrl('addprescription/postPower', ['_secure' => true]);
    }*/

}