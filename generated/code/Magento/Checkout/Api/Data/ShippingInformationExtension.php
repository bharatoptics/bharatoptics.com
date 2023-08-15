<?php
namespace Magento\Checkout\Api\Data;

/**
 * Extension class for @see \Magento\Checkout\Api\Data\ShippingInformationInterface
 */
class ShippingInformationExtension extends \Magento\Framework\Api\AbstractSimpleObject implements ShippingInformationExtensionInterface
{
    /**
     * @return string|null
     */
    public function getSphRight()
    {
        return $this->_get('sph_right');
    }

    /**
     * @param string $sphRight
     * @return $this
     */
    public function setSphRight($sphRight)
    {
        $this->setData('sph_right', $sphRight);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSphLeft()
    {
        return $this->_get('sph_left');
    }

    /**
     * @param string $sphLeft
     * @return $this
     */
    public function setSphLeft($sphLeft)
    {
        $this->setData('sph_left', $sphLeft);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCylRight()
    {
        return $this->_get('cyl_right');
    }

    /**
     * @param string $cylRight
     * @return $this
     */
    public function setCylRight($cylRight)
    {
        $this->setData('cyl_right', $cylRight);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCylLeft()
    {
        return $this->_get('cyl_left');
    }

    /**
     * @param string $cylLeft
     * @return $this
     */
    public function setCylLeft($cylLeft)
    {
        $this->setData('cyl_left', $cylLeft);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAxisRight()
    {
        return $this->_get('axis_right');
    }

    /**
     * @param string $axisRight
     * @return $this
     */
    public function setAxisRight($axisRight)
    {
        $this->setData('axis_right', $axisRight);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAxisLeft()
    {
        return $this->_get('axis_left');
    }

    /**
     * @param string $axisLeft
     * @return $this
     */
    public function setAxisLeft($axisLeft)
    {
        $this->setData('axis_left', $axisLeft);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAdRight()
    {
        return $this->_get('ad_right');
    }

    /**
     * @param string $adRight
     * @return $this
     */
    public function setAdRight($adRight)
    {
        $this->setData('ad_right', $adRight);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAdLeft()
    {
        return $this->_get('ad_left');
    }

    /**
     * @param string $adLeft
     * @return $this
     */
    public function setAdLeft($adLeft)
    {
        $this->setData('ad_left', $adLeft);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPrescriptionFile()
    {
        return $this->_get('prescription_file');
    }

    /**
     * @param string $prescriptionFile
     * @return $this
     */
    public function setPrescriptionFile($prescriptionFile)
    {
        $this->setData('prescription_file', $prescriptionFile);
        return $this;
    }
}
