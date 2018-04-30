<?php
/**
 * @Entity @Table(name="managers")
 */
class Managers
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var string
     */
    protected $manager_id;
    /**
     * @Column(type="integer")
     * @var string
     */
    protected $Stations_station_id;
    /**
     * @Column(type="integer")
     * @var string
     */
    protected $Users_user_id;

    /**
     * @return string
     */
    public function getManagerId(): string
    {
        return $this->manager_id;
    }

    /**
     * @param string $manager_id
     */
    public function setManagerId(string $manager_id): void
    {
        $this->manager_id = $manager_id;
    }

    /**
     * @return string
     */
    public function getStationsStationId(): string
    {
        return $this->Stations_station_id;
    }

    /**
     * @param string $Stations_station_id
     */
    public function setStationsStationId(string $Stations_station_id): void
    {
        $this->Stations_station_id = $Stations_station_id;
    }

    /**
     * @return string
     */
    public function getUsersUserId(): string
    {
        return $this->Users_user_id;
    }

    /**
     * @param string $Users_user_id
     */
    public function setUsersUserId(string $Users_user_id): void
    {
        $this->Users_user_id = $Users_user_id;
    }



}