<?php
namespace Magelearn\DeliveryDate\Observer;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\View\Element\TemplateFactory;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Magento\Store\Model\ScopeInterface;

class AddHtmlToOrderShippingBlock implements ObserverInterface
{
    /**
     * @var TemplateFactory
     */
    protected $templateFactory;

    /**
     * @var TimezoneInterface
     */
    private $timezone;

    /**
     * AddHtmlToOrderShippingBlock constructor.
     *
     * @param TemplateFactory $templateFactory
     * @param TimezoneInterface $timezone
     */
    public function __construct(
        TemplateFactory $templateFactory,
        TimezoneInterface $timezone
    ) {
        $this->templateFactory = $templateFactory;
        $this->timezone = $timezone;
    }

    /**
     * @param EventObserver $observer
     * @return $this
     */
    public function execute(EventObserver $observer)
    {
        if($observer->getElementName() == 'sales.order.info') {
			$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
			$storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
			/* $baseUrl = $storeManager->getStore()->getBaseUrl(); */
			$mediaUrl =$storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
			
            $orderShippingViewBlock = $observer->getLayout()->getBlock($observer->getElementName());
            $order = $orderShippingViewBlock->getOrder();
            /* if($order->getDeliveryDate() != '0000-00-00 00:00:00') {
                $formattedDate = $this->timezone->formatDateTime(
                    $order->getDeliveryDate(),
                    \IntlDateFormatter::MEDIUM,
                    \IntlDateFormatter::MEDIUM,
                    null,
                    $this->timezone->getConfigTimezone(
                        ScopeInterface::SCOPE_STORE,
                        $order->getStore()->getCode()
                    )
                );
            } else {
                $formattedDate = __('N/A');
            } */

            /** @var \Magento\Framework\View\Element\Template $deliveryDateBlock */
            $deliveryDateBlock = $this->templateFactory->create();
            $deliveryDateBlock->setSphRight($order->getSphRight());
            $deliveryDateBlock->setSphLeft($order->getSphLeft());
            $deliveryDateBlock->setCylRight($order->getCylRight());
            $deliveryDateBlock->setCylLeft($order->getCylLeft());
            $deliveryDateBlock->setAxisRight($order->getAxisRight());
            $deliveryDateBlock->setAxisLeft($order->getAxisLeft());
            $deliveryDateBlock->setAdRight($order->getAdRight());
            $deliveryDateBlock->setAdLeft($order->getAdLeft());
            $deliveryDateBlock->setPrescriptionFile($order->getPrescriptionFile());
            $deliveryDateBlock->setMediaUrl($mediaUrl);
			
            $deliveryDateBlock->setTemplate('Magelearn_DeliveryDate::order_info_shipping_info.phtml');
            $html = $observer->getTransport()->getOutput() . $deliveryDateBlock->toHtml();
            $observer->getTransport()->setOutput($html);
        }

        return $this;
    }
}