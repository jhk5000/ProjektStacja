<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 2018-04-25
 * Time: 14:19
 */
/**
 * @Entity @Table(name="avgprices")
 */
class Avgprices
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var string
     */
    protected $id;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $city;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $PB98;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $PB95;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $OIL;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $LPG;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $reg_date;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getPB98(): string
    {
        return $this->PB98;
    }

    /**
     * @param string $PB98
     */
    public function setPB98(string $PB98): void
    {
        $this->PB98 = $PB98;
    }

    /**
     * @return string
     */
    public function getPB95(): string
    {
        return $this->PB95;
    }

    /**
     * @param string $PB95
     */
    public function setPB95(string $PB95): void
    {
        $this->PB95 = $PB95;
    }

    /**
     * @return string
     */
    public function getOIL(): string
    {
        return $this->OIL;
    }

    /**
     * @param string $OIL
     */
    public function setOIL(string $OIL): void
    {
        $this->OIL = $OIL;
    }

    /**
     * @return string
     */
    public function getLPG(): string
    {
        return $this->LPG;
    }

    /**
     * @param string $LPG
     */
    public function setLPG(string $LPG): void
    {
        $this->LPG = $LPG;
    }

    /**
     * @return string
     */
    public function getRegDate(): string
    {
        return $this->reg_date;
    }

    /**
     * @param string $reg_date
     */
    public function setRegDate(string $reg_date): void
    {
        $this->reg_date = $reg_date;
    }



}