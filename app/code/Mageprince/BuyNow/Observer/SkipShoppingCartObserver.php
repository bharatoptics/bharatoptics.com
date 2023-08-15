<?php 
namespace Mageprince\BuyNow\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class SkipShoppingCartObserver implements ObserverInterface
{
    protected $uri;
    protected $responseFactory;
    protected $_urlinterface;

 public function __construct(
        \Zend\Validator\Uri $uri,
        \Magento\Framework\UrlInterface $urlinterface,
        \Magento\Framework\App\ResponseFactory $responseFactory,
         \Magento\Framework\App\RequestInterface $request
    ) {
        $this->uri = $uri;
        $this->_urlinterface = $urlinterface;
        $this->responseFactory = $responseFactory;
        $this->_request = $request;
    }

    public function execute(Observer $observer)
    {
        /* $resultRedirect = $this->responseFactory->create();
        $resultRedirect->setRedirect('https://phplaravel-783214-2670440.cloudwaysapps.com/checkout/')->sendResponse('200');
        exit(); */
    }
}