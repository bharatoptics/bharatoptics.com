<?php
namespace PayUIndia\Payu\Controller\Standard\Cancel;

/**
 * Interceptor class for @see \PayUIndia\Payu\Controller\Standard\Cancel
 */
class Interceptor extends \PayUIndia\Payu\Controller\Standard\Cancel implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Customer\Model\Session $customerSession, \Magento\Checkout\Model\Session $checkoutSession, \Magento\Quote\Api\CartRepositoryInterface $quoteRepository, \Magento\Sales\Model\OrderFactory $orderFactory, \Psr\Log\LoggerInterface $logger, \PayUIndia\Payu\Model\Payu $paymentMethod, \PayUIndia\Payu\Helper\Payu $checkoutHelper, \Magento\Quote\Api\CartManagementInterface $cartManagement, \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory)
    {
        $this->___init();
        parent::__construct($context, $customerSession, $checkoutSession, $quoteRepository, $orderFactory, $logger, $paymentMethod, $checkoutHelper, $cartManagement, $resultJsonFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute();
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        return $pluginInfo ? $this->___callPlugins('dispatch', func_get_args(), $pluginInfo) : parent::dispatch($request);
    }
}
