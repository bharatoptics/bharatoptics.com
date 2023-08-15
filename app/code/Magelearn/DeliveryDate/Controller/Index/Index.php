<?php
namespace Magelearn\DeliveryDate\Controller\Index;


class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $request;
	protected $orderFactory;
	protected $adapterFactory;
	protected $_filesystem;
	protected $uploaderFactory;
	protected $jsonResultFactory;
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\App\Request\Http $request,
		\Magento\Sales\Api\Data\OrderInterface $orderinterface,
		\Magento\Framework\Image\AdapterFactory $adapterFactory,
		\Magento\Framework\Filesystem $_filesystem,
		\Magento\MediaStorage\Model\File\UploaderFactory $uploaderFactory,
		\Magento\Framework\Controller\Result\JsonFactory $jsonResultFactory,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_pageFactory = $pageFactory;
		$this->request = $request;
		$this->orderinterface = $orderinterface;
		$this->_filesystem = $_filesystem;
		$this->adapterFactory = $adapterFactory;
		$this->uploaderFactory = $uploaderFactory;
		$this->jsonResultFactory = $jsonResultFactory;
		$this->mediaDirectory = $_filesystem->getDirectoryWrite(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
		return parent::__construct($context);
	}

	public function execute()
	{
		$params = $this->request->getParams();
		$increment_id = $this->request->getParam('order_id');
		$order_id = '';
		if(isset($params['order_id']) && $params['order_id']!=null) {
			$incrementId = $params['order_id'];
			$order = $this->orderinterface->loadByIncrementId($incrementId);
			$order_id = $order->getId();			
			$sph = $order->getId();			
		}
		$params = $this->request->getParams();
		
		if(isset($_FILES['prescription_image']['name']) && $_FILES['prescription_image']['name'] != '') {
			try{
				$uploaderFactory = $this->uploaderFactory->create(['fileId' => 'prescription_image']);
                $uploaderFactory->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                $imageAdapter = $this->adapterFactory->create();
                $uploaderFactory->addValidateCallback('custom_image_upload',$imageAdapter,'validateUploadFile');
                $uploaderFactory->setAllowRenameFiles(true);
                $uploaderFactory->setFilesDispersion(true);
               /*  $mediaDirectory = $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA); */
                $destinationPath = $this->mediaDirectory->getAbsolutePath('prescription/upload');
				$result = $uploaderFactory->save($destinationPath);
                if (!$result) {
                    throw new LocalizedException(
                        __('File cannot be saved to path: $1', $destinationPath)
                    );
                }
                
                $imagePath = 'prescription/upload'.$result['file'];
                $data['prescription_image'] = $imagePath;
                //$data['prescription_image'];
				$order->setPrescriptionFile($imagePath);
				$this->orderinterface->save($order);
				$data = array('image' => $imagePath, 'status' => 1);
				echo json_encode($data);
				/* $o = new stdClass;              
				$o->status = 1;	
				$jsonResultFactoryResults->setData($o);
				return $jsonResultFactoryResults; */ exit();
            } catch (\Exception $e) {
                //echo $e->getMessage();
				$data = array('image' => '', 'status' => 0);
				echo json_encode($data);
				/* $o = new stdClass;              
				$o->status = 0;	
				$jsonResultFactoryResults->setData($o);
				return $jsonResultFactoryResults; */ exit();
            }
			
		}
		if(isset($params['right_sph']) && $params['right_sph']!=null && $params['right_sph']!=0 && $order) {
			$order->setSphRight($params['right_sph']); 
			$order->setSphLeft($params['left_sph']); 
			$order->setCylRight($params['right_cyl']);
			$order->setCylLeft($params['left_cyl']);  
			$order->setAxisRight($params['right_axis']);  
			$order->setAxisLeft($params['left_axis']);  
			$order->setAdRight($params['right_add']);
			$order->setAdLeft($params['left_add']);
			try {	
				$this->orderinterface->save($order);	
				//$this->messageManager->addSuccess(__("You have saved Eye Power for your order."));
				//$block->setData('status', 1);
				echo json_encode(1);
				//$jsonResultFactoryResults->setData($o);
				//return $jsonResultFactoryResults; 
				exit();
			} catch (\Exception $e){
					
				echo json_encode(0);
				/* $jsonResultFactoryResults->setData($o);
				return $jsonResultFactoryResults; 
				 */exit();
				//$this->messageManager->addError(__($e->getMessage()));
			}
		}
		$page = $this->_pageFactory->create();
		$block = $page->getLayout()->getBlock('addprescription_index_index');
		
		$block->setData('order_id', $order_id);
		$block->setData('increment_id', $increment_id);

		return $page;
		
		/* return $this->_pageFactory->create(); */
	}
	/* public function uploadFile()
    {
        $yourFolderName = 'prescriptions/';
        $yourInputFileName = 'file';
        try{
            $file = $this->getRequest()->getFiles('file');
            $fileName = ($file && array_key_exists('name', $file)) ? $file['name'] : null;

            if ($file && $fileName) {
                $target = $this->mediaDirectory->getAbsolutePath('prescriptions/');                        
                $uploader = $this->fileUploader->create(['fileId' => 'file']);
                $uploader->setAllowedExtensions(['jpg', 'pdf', 'doc', 'png', 'zip']);
                $uploader->setAllowCreateFolders(true);
				$uploader->setAllowRenameFiles(true);
                / * $uploader->setFilesDispersion(true);* /         
                $result = $uploader->save($target);

                / * if ($result['file']) {
                    $this->messageManager->addSuccess(__('File has been successfully uploaded.')); 
                } * /
                
                return $target . $uploader->getUploadedFileName();
            }
        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
        }

        return false;
    } * /
	/ * public function post() {
		$params = $this->request->getParams();
		
		if (isset($_FILES['prescription_image']) && $_FILES['prescription_image']['name']) {
			$results = $this->uploadFile();
			echo '<pre>';
			print_r($results);
			exit();	
			//$order->setSphRight($params['prescription_image']);
			
		}
		echo '<pre>';
		print_r($params);
		exit();
	} */
	
}
