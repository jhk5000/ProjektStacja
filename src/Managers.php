<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 2018-04-25
 * Time: 14:19
 */

class Managers
{

    protected $manager_id;
    protected $Stations_station_id;
    protected $Users_user_id;

    /**
     * Managers constructor.
     * @param $manager_id
     * @param $Stations_station_id
     * @param $Users_user_id
     */
    public function __construct($manager_id, $Stations_station_id, $Users_user_id)
    {
        $this->manager_id = $manager_id;
        $this->Stations_station_id = $Stations_station_id;
        $this->Users_user_id = $Users_user_id;
    }

    /**
     * @return mixed
     */
    public function getManagerId()
    {
        return $this->manager_id;
    }

    /**
     * @param mixed $manager_id
     */
    public function setManagerId($manager_id)
    {
        $this->manager_id = $manager_id;
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
    public function getUsersUserId()
    {
        return $this->Users_user_id;
    }

    /**
     * @param mixed $Users_user_id
     */
    public function setUsersUserId($Users_user_id)
    {
        $this->Users_user_id = $Users_user_id;
    }



}