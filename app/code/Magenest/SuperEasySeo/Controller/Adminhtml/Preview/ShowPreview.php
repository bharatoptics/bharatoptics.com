<?php
/**
 * Copyright © 2017 Magenest. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace Magenest\SuperEasySeo\Controller\Adminhtml\Preview;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory as ResultJsonFactory;
use Magento\Catalog\Model\ProductFactory;
use Magento\Catalog\Model\CategoryFactory;

/**
 * Class ShowPreview
 * @package Magenest\SuperEasySeo\Controller\Adminhtml\Preview
 */
class ShowPreview extends \Magento\Framework\App\Action\Action
{

    /**
     * @var ResultJsonFactory
     */
    protected $resultJsonFactory;

    /**
     * @var ProductFactory
     */
    protected $productFactory;

    /**
     * @var CategoryFactory
     */
    protected $categoryFactory;

    /**
     * ShowPreview constructor.
     * @param Context $context
     * @param ResultJsonFactory $resultJsonFactory
     * @param ProductFactory $productFactory
     * @param CategoryFactory $categoryFactory
     */
    public function __construct(
        Context $context,
        ResultJsonFactory $resultJsonFactory,
        ProductFactory $productFactory,
        CategoryFactory $categoryFactory
    ) {
        $this->categoryFactory = $categoryFactory;
        $this->productFactory = $productFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        parent::__construct($context);
    }

    /**
     * execute
     */
    public function execute()
    {
        $data = $this->_getDataJson();
        $resultJson = $this->resultJsonFactory->create();

        return $resultJson->setData($data);
    }

    /**
     * @return string
     */
    protected function _getDataJson()
    {

        $data = $this->getRequest()->getParams();
        if (!(isset($data['id']) && $data['id'])) {
            return [];
        }
        $id = $data['id'];
        $type = $data['type'];
        if ($type == 'product') {
            $model = $this->productFactory->create()->load($id);
            $path = $model->getUrlModel()->getUrlInStore($model, $additional = []);
        }

        if ($type == 'category') {
            $model = $this->categoryFactory->create()->load($id);
            $path = $model->getUrl();
        }

        $metaTitle = $model->getName();

        if (strlen($metaTitle) > 55) {
            $metaTitle = substr($metaTitle, 0, 50).' ... ';
        }
        $metaDescription = $model->getMetaDescription();

        if (strlen($metaDescription) > 155) {
            $metaDescription = substr($metaDescription, 0, 150).' ... ';
        }

        $array = [
            'url_key' => $path,
            'name' => $model->getName(),
            'meta_title' => $metaTitle,
            'size' => strlen($model->getMetaTitle()),
            'meta_description' => $metaDescription
        ];

        return $array;
    }
}
