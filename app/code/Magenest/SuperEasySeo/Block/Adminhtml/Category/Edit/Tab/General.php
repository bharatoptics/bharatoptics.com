<?php
/**
 * Copyright © 2017 Magenest. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace Magenest\SuperEasySeo\Block\Adminhtml\Category\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;

/**
 * Class General
 * @package Magenest\SuperEasySeo\Block\Adminhtml\Category\Edit\Tab
 */
class General extends Generic implements TabInterface
{
    protected $_prepareForm;

    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @var \Magento\Customer\Api\GroupRepositoryInterface
     */
    protected $_groupRepository;

    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    protected $_searchCriteriaBuilder;

    /**
     * @var \Magento\Framework\Convert\DataObject
     */
    protected $_objectConverter;

    /**
     * @var
     */
    protected $_fieldFactory;

    /**
     * Main constructor.
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Customer\Api\GroupRepositoryInterface $groupRepository
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     * @param \Magento\Framework\Convert\DataObject $objectConverter
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Customer\Api\GroupRepositoryInterface $groupRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\Convert\DataObject $objectConverter,
        \Magento\Store\Model\System\Store $systemStore,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        $this->_groupRepository = $groupRepository;
        $this->_searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->_objectConverter = $objectConverter;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * prepare form
     * @return $this
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareForm()
    {
        /* @var $model \Magenest\SuperEasySeo\Model\Template */
        $model = $this->_coreRegistry->registry('template');
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('page_');

        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('General Information')]);

        if ($model->getId()) {
            $fieldset->addField(
                'template_id',
                'hidden',
                [
                    'name' =>'template_id'
                ]
            );
        }
        $fieldset->addField(
            'enabled',
            'select',
            [
                'name' => 'enabled',
                'label' => __('Is Actived'),
                'title' => __('Is Actived'),
                'options' => ['0' => __('No'), '1' => __('Yes')],
            ]
        );
        $fieldset->addField(
            'assign_type',
            'radios',
            [
                'label' => __('Assign Type'),
                'title' => __('Assign Type'),
                'name' => 'assign_type',
                'required' => true,
                'values' => [
                    ['value'=>'1','label'=>'All Categories'],
                    ['value'=>'2','label'=>'Specific Categories'],
                ]

            ]
        );
        $fieldset->addField(
            'store',
            'select',
            [
                'name'     => 'store',
                'label'    => __('Store Views'),
                'title'    => __('Store Views'),
                'required' => true,
                'values'   => $this->_systemStore->getStoreValuesForForm(false, true),
            ]
        );
        $fieldset->addField(
            'name_template',
            'text',
            [
                'name' => 'name_template',
                'label' => __('Name'),
                'title' => __('Name'),
                'required' => true,
            ]
        );
        $fieldset->addField(
            'url_key',
            'text',
            [
                'name' => 'url_key',
                'label' => __('Url Key'),
                'title' => __('Template Description'),
            ]
        );
        $fieldset->addField(
            'description',
            'text',
            [
                'name' => 'description',
                'label' => __('Template Description'),
                'title' => __('Template Description'),
            ]
        );
        $fieldset->addField(
            'meta_title',
            'text',
            [
                'name' => 'meta_title',
                'label' => __('Template Meta Title'),
                'title' => __('Template Meta Title'),
            ]
        );
        $fieldset->addField(
            'meta_description',
            'text',
            [
                'name' => 'meta_description',
                'label' => __('Template Meta Description'),
                'title' => __('Template Meta Description'),
                'note'      => __('
                Some example product attributes that you can use include: . To get a full set of attributes that your product support, go to system  --> attribute set.
                <li>Example with a template : [(ABCD||DEFG)][name||sku||color]</li>
                <p>You will received text sample : ABCD Product name</p>
                <p>- Text on [ ] and below ( ) is string</p>
                <p>- || is or</p>
                <p>- Text on [ ] is attribute</p>
                ')
            ]
        );
        $fieldset->addField(
            'sort_order',
            'text',
            [
                'name' => 'sort_order',
                'label' => __('Priority'),
                'title' => __('Priority'),
                'class' => 'validate-number',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'apply_for',
            'select',
            [
                'name' => 'apply_for',
                'label' => __('Apply For'),
                'title' => __('Apply For'),
                'options' => ['0' => __('Empty'), '1' => __('All')],
            ]
        );


        $form->setValues($model->getData());
        $this->setForm($form);
        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * Prepare label for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabLabel()
    {
        return __('General');
    }

    /**
     * Prepare title for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabTitle()
    {
        return __('General');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}
