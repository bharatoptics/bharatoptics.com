<?php
namespace Sk\Gcsv\Controller\Index\Index;

/**
 * Interceptor class for @see \Sk\Gcsv\Controller\Index\Index
 */
class Interceptor extends \Sk\Gcsv\Controller\Index\Index implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\App\Response\Http\FileFactory $fileFactory, \Magento\Catalog\Model\ProductFactory $productFactory, \Magento\Framework\View\Result\LayoutFactory $resultLayoutFactory, \Magento\Framework\File\Csv $csvProcessor, \Magento\Catalog\Helper\Image $imageHelper, \Magento\Framework\App\Filesystem\DirectoryList $directoryList)
    {
        $this->___init();
        parent::__construct($context, $fileFactory, $productFactory, $resultLayoutFactory, $csvProcessor, $imageHelper, $directoryList);
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
