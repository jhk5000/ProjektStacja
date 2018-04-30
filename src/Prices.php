<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 2018-04-25
 * Time: 14:04
 */


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
     * @OneToMany(targetEntity="Stations", inversedBy="station_id")
     */
    protected $Stations_station_id;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $gas_type;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $price;

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
    public function getGasType()
    {
        return $this->gas_type;
    }

    /**
     * @param string $gas_type
     */
    public function setGasType($gas_type)
    {
        $this->gas_type = $gas_type;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }


}