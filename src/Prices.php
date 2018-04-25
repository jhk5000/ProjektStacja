<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 2018-04-25
 * Time: 14:04
 */

class Prices
{

    protected $price_id;
    protected $Stations_station_id;
    protected $gas_type;
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
     * @return mixed
     */
    public function getPriceId()
    {
        return $this->price_id;
    }

    /**
     * @param mixed $price_id
     */
    public function setPriceId($price_id)
    {
        $this->price_id = $price_id;
    }

    /**
     * @return mixed
     */
    public function getStationsStationId()
    {
        return $this->Stations_station_id;
    }

    /**
     * @param mixed $Stations_station_id
     */
    public function setStationsStationId($Stations_station_id)
    {
        $this->Stations_station_id = $Stations_station_id;
    }

    /**
     * @return mixed
     */
    public function getGasType()
    {
        return $this->gas_type;
    }

    /**
     * @param mixed $gas_type
     */
    public function setGasType($gas_type)
    {
        $this->gas_type = $gas_type;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }


}