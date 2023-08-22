<?php
namespace Bss\HtmlSiteMap\Controller\Router;

/**
 * Interceptor class for @see \Bss\HtmlSiteMap\Controller\Router
 */
class Interceptor extends \Bss\HtmlSiteMap\Controller\Router implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\ActionFactory $actionFactory, \Magento\Framework\Event\ManagerInterface $eventManager, \Magento\Framework\View\Result\PageFactory $resultPageFactory, \Magento\Framework\Controller\ResultFactory $resultFactory, \Magento\Framework\UrlInterface $url, \Magento\Store\Model\StoreManagerInterface $storeManager, \Bss\HtmlSiteMap\Helper\Data $helper)
    {
        $this->___init();
        parent::__construct($actionFactory, $eventManager, $resultPageFactory, $resultFactory, $url, $storeManager, $helper);
    }

    /**
     * {@inheritdoc}
     */
    public function match(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'match');
        return $pluginInfo ? $this->___callPlugins('match', func_get_args(), $pluginInfo) : parent::match($request);
    }
}
