<?php
namespace Magento\Checkout\Api\Data;

/**
 * ExtensionInterface class for @see \Magento\Checkout\Api\Data\ShippingInformationInterface
 */
interface ShippingInformationExtensionInterface extends \Magento\Framework\Api\ExtensionAttributesInterface
{
    /**
     * @return string|null
     */
    public function getSphRight();

    /**
     * @param string $sphRight
     * @return $this
     */
    public function setSphRight($sphRight);

    /**
     * @return string|null
     */
    public function getSphLeft();

    /**
     * @param string $sphLeft
     * @return $this
     */
    public function setSphLeft($sphLeft);

    /**
     * @return string|null
     */
    public function getCylRight();

    /**
     * @param string $cylRight
     * @return $this
     */
    public function setCylRight($cylRight);

    /**
     * @return string|null
     */
    public function getCylLeft();

    /**
     * @param string $cylLeft
     * @return $this
     */
    public function setCylLeft($cylLeft);

    /**
     * @return string|null
     */
    public function getAxisRight();

    /**
     * @param string $axisRight
     * @return $this
     */
    public function setAxisRight($axisRight);

    /**
     * @return string|null
     */
    public function getAxisLeft();

    /**
     * @param string $axisLeft
     * @return $this
     */
    public function setAxisLeft($axisLeft);

    /**
     * @return string|null
     */
    public function getAdRight();

    /**
     * @param string $adRight
     * @return $this
     */
    public function setAdRight($adRight);

    /**
     * @return string|null
     */
    public function getAdLeft();

    /**
     * @param string $adLeft
     * @return $this
     */
    public function setAdLeft($adLeft);

    /**
     * @return string|null
     */
    public function getPrescriptionFile();

    /**
     * @param string $prescriptionFile
     * @return $this
     */
    public function setPrescriptionFile($prescriptionFile);
}
