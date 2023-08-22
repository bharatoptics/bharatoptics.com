<?php
namespace Magelearn\DeliveryDate\Controller\Index\Index;

/**
 * Interceptor class for @see \Magelearn\DeliveryDate\Controller\Index\Index
 */
class Interceptor extends \Magelearn\DeliveryDate\Controller\Index\Index implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\App\Request\Http $request, \Magento\Sales\Api\Data\OrderInterface $orderinterface, \Magento\Framework\Image\AdapterFactory $adapterFactory, \Magento\Framework\Filesystem $_filesystem, \Magento\MediaStorage\Model\File\UploaderFactory $uploaderFactory, \Magento\Framework\Controller\Result\JsonFactory $jsonResultFactory, \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->___init();
        parent::__construct($context, $request, $orderinterface, $adapterFactory, $_filesystem, $uploaderFactory, $jsonResultFactory, $pageFactory);
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
