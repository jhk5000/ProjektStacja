<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 2018-04-25
 * Time: 14:19
 */
/**
 * @Entity @Table(name="companies")
 */
class Companies
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var string
     */
    protected $company_id;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $company_name;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $address;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $discount;
    /**
     * @return string
     */
    public function getCompanyId(): string
    {
        return $this->company_id;
    }
    /**
     * @param string $company_id
     */
    public function setCompanyId(string $company_id): void
    {
        $this->company_id = $company_id;
    }
    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->company_name;
    }
    /**
     * @param string $company_name
     */
    public function setCompanyName(string $company_name): void
    {
        $this->company_name = $company_name;
    }
    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }
    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }
    /**
     * @return string
     */
    public function getDiscount(): string
    {
        return $this->discount;
    }
    /**
     * @param string $discount
     */
    public function setDiscount(string $discount): void
    {
        $this->discount = $discount;
    }
}