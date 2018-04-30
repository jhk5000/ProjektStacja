<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 2018-04-25
 * Time: 14:04
 */

use Doctrine\ORM\Mapping as ORM;


/**
 * @Entity @Table(name="prices")
 */
class Prices
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var string
     */
    protected $price_id;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $Stations_station_id;
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
    protected $ON;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $LPG;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $date_of_change;

    /**
     * Prices constructor.
     * @param $price_id
     * @param $Stations_station_id
     * @param $gas_type
     * @param $price
     */
    public function __construct($price_id, $Stations_station_id, $gas_type, $price)
    {
        $this->price_id = $price_id;
        $this->Stations_station_id = $Stations_station_id;
        $this->gas_type = $gas_type;
        $this->price = $price;
    }


    /**
     * @return string
     */
    public function getPriceId()
    {
        return $this->price_id;
    }


    /**
     * @param string $price_id
     */
    public function setPriceId($price_id)
    {
        $this->price_id = $price_id;
    }


    /**
     * @return string
     */
    public function getStationsStationId()
    {
        return $this->Stations_station_id;
    }

    /**
     * @param string $Stations_station_id
     */
    public function setStationsStationId($Stations_station_id)
    {
        $this->Stations_station_id = $Stations_station_id;
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
    public function getON(): string
    {
        return $this->ON;
    }

    /**
     * @param string $ON
     */
    public function setON(string $ON): void
    {
        $this->ON = $ON;
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
    public function getDateOfChange(): string
    {
        return $this->date_of_change;
    }

    /**
     * @param string $date_of_change
     */
    public function setDateOfChange(string $date_of_change): void
    {
        $this->date_of_change = $date_of_change;
    }


}