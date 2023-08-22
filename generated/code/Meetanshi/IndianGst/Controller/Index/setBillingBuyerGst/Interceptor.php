<?php
namespace Meetanshi\IndianGst\Controller\Index\setBillingBuyerGst;

/**
 * Interceptor class for @see \Meetanshi\IndianGst\Controller\Index\setBillingBuyerGst
 */
class Interceptor extends \Meetanshi\IndianGst\Controller\Index\setBillingBuyerGst implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Meetanshi\IndianGst\Helper\Data $helper, \Magento\Framework\App\Action\Context $context, \Magento\Framework\View\Result\PageFactory $pageFactory, \Magento\Checkout\Model\Session $checkoutSession)
    {
        $this->___init();
        parent::__construct($helper, $context, $pageFactory, $checkoutSession);
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
