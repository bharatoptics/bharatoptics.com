<?php
namespace Meetanshi\IndianGst\Model\Resolver\ShippingCgst;

/**
 * Interceptor class for @see \Meetanshi\IndianGst\Model\Resolver\ShippingCgst
 */
class Interceptor extends \Meetanshi\IndianGst\Model\Resolver\ShippingCgst implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Quote\Api\CartTotalRepositoryInterface $cartTotalRepository, \Meetanshi\IndianGst\Helper\Data $helperData)
    {
        $this->___init();
        parent::__construct($cartTotalRepository, $helperData);
    }

    /**
     * {@inheritdoc}
     */
    public function resolve(\Magento\Framework\GraphQl\Config\Element\Field $field, $context, \Magento\Framework\GraphQl\Schema\Type\ResolveInfo $info, ?array $value = null, ?array $args = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'resolve');
        return $pluginInfo ? $this->___callPlugins('resolve', func_get_args(), $pluginInfo) : parent::resolve($field, $context, $info, $value, $args);
    }
}
