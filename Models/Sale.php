<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 23.02.18
 * Time: 14:26
 */


namespace PaulSale\Models;

use Doctrine\ORM\Mapping as ORM;
use Shopware\Components\Model\ModelEntity;

/**
 * @ORM\Entity(repositoryClass="Repository")
 * @ORM\Table(name="paul_sale")
 */
class Sale extends ModelEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\Column(name="validFrom", type="datetime", nullable=false)
     */
    private $validFrom;

    /**
     * @ORM\Column(name="validTill", type="datetime", nullable=false)
     */
    private $validTill;

    /**
     * @ORM\Column(name="salePercentage", type="integer", nullable=false)
     */
    private $salePercentage;

    /**
     * @ORM\Column(name="saleCategoryId", type="integer", nullable=false)
     */
    private $saleCategoryId;

    /**
     * Answer constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getValidFrom()
    {
        return $this->validFrom;
    }

    /**
     * @param mixed $validFrom
     */
    public function setValidFrom($validFrom)
    {
        $this->validFrom = $validFrom;
    }

    /**
     * @return mixed
     */
    public function getValidTill()
    {
        return $this->validTill;
    }

    /**
     * @param mixed $validTill
     */
    public function setValidTill($validTill)
    {
        $this->validTill = $validTill;
    }

    /**
     * @return mixed
     */
    public function getSalePercentage()
    {
        return $this->salePercentage;
    }

    /**
     * @param mixed $salePercentage
     */
    public function setSalePercentage($salePercentage)
    {
        $this->salePercentage = $salePercentage;
    }

    /**
     * @return mixed
     */
    public function getSaleCategoryId()
    {
        return $this->saleCategoryId;
    }

    /**
     * @param mixed $saleCategoryId
     */
    public function setSaleCategoryId($saleCategoryId)
    {
        $this->saleCategoryId = $saleCategoryId;
    }



}
