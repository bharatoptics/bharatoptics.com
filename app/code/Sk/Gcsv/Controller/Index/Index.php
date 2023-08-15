<?php
/**
 * Created By : Rohan Hapani
 */
namespace Sk\Gcsv\Controller\Index;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\ResponseInterface;
class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\App\Response\Http\FileFactory
     */
    protected $fileFactory;
    /**
     * @var \Magento\Catalog\Model\ProductFactory
     */
    protected $productFactory;
    /**
     * @var \Magento\Framework\View\Result\LayoutFactory
     */
    protected $resultLayoutFactory;
    /**
     * @var \Magento\Framework\File\Csv
     */
    protected $csvProcessor;
    /**
     * @var \Magento\Framework\App\Filesystem\DirectoryList
     */
    protected $directoryList;
	protected $imageHelper;
    /**
     * @param \Magento\Framework\App\Action\Context            $context
     * @param \Magento\Framework\App\Response\Http\FileFactory $fileFactory
     * @param \Magento\Catalog\Model\ProductFactory            $productFactory
     * @param \Magento\Framework\View\Result\LayoutFactory     $resultLayoutFactory
     * @param \Magento\Framework\File\Csv                      $csvProcessor
     * @param \Magento\Framework\App\Filesystem\DirectoryList  $directoryList
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\App\Response\Http\FileFactory $fileFactory,
        \Magento\Catalog\Model\ProductFactory $productFactory,
        \Magento\Framework\View\Result\LayoutFactory $resultLayoutFactory,
        \Magento\Framework\File\Csv $csvProcessor,
		\Magento\Catalog\Helper\Image $imageHelper,
        \Magento\Framework\App\Filesystem\DirectoryList $directoryList
    ) {
        $this->fileFactory = $fileFactory;
        $this->productFactory = $productFactory;
        $this->resultLayoutFactory = $resultLayoutFactory;
        $this->csvProcessor = $csvProcessor;
		$this->imageHelper = $imageHelper;
        $this->directoryList = $directoryList;
        parent::__construct($context);
    }
    /**
     * CSV Create and Download
     *
     * @return ResponseInterface
     * @throws \Magento\Framework\Exception\FileSystemException
     */
    public function execute()
    {
        /** Add yout header name here */
        $content[] = [
            'id' => __('id'),
            'title' => __('title'),
            'link' => __('link'),
            'canonical_link' => __('canonical_link'),
            'image_link' => __('image_link'),
            'description' => __('description'),
            'availability' => __('availability'),
            'price' => __('price'),
            'sale_price' => __('sale_price'),
			'Contextual keywords' => __('Contextual keywords'),
            'mobile_link' => __('mobile_link')
        ];
        $resultLayout = $this->resultLayoutFactory->create();
        $product = $this->productFactory->create()->getCollection();
        $collection = $this->productFactory->create()->getCollection();
        
        $fileName = 'feed.csv'; // Add Your CSV File name
        $filePath =  $this->directoryList->getPath(DirectoryList::MEDIA) . "/" . $fileName;
        while ($product = $collection->fetchItem()) {
			$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
			$_product = $objectManager->create('Magento\Catalog\Model\Product')->load($product->getEntityId());
            $category_ids = $product->getCategoryIds();
			$category_ids = array_unique($category_ids);
			$category_name = '';
			foreach($category_ids as $key => $ids) {
				//if($key==1) {
					 $cat = $objectManager->create('Magento\Catalog\Model\Category')->load($ids);
					$category_name = $cat->getName();
				//}
				
			}
			$image_url = $this->imageHelper->init($_product, 'product_page_image_medium')->getUrl();
			$status = $_product->getStatus();
			$salable = $_product->getIsSalable();
			if($status==true && $salable == true) {
			$content[] = [
                $product->getEntityId(),
                $_product->getName(),
                $_product->getProductUrl(),
                $_product->getProductUrl(),
                $image_url,
                'Free Shipping - Cash On Delivery Available for all orders',
                'in_stock',
                $_product->getPrice().' INR',
                $_product->getSpecialPrice().' INR',
				$_product->getMetaKeyword(),
                $product->getProductUrl()
            ];
			}
        }
        $this->csvProcessor->setEnclosure('"')->setDelimiter(',')->saveData($filePath, $content);
        return $this->fileFactory->create(
            $fileName,
            [
                'type'  => "filename",
                'value' => $fileName,
                'rm'    => false, // True => File will be remove from directory after download.
            ],
            DirectoryList::MEDIA,
            'text/csv',
            null
        );
    }
}