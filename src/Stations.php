<?php
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity(repositoryClass="BugRepository") @Table(name="bugs")
 */
class Stations
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     */
    protected $station_id;
    protected $name;
    protected $voivodeship;
    protected $city;
    protected $street;

    /**
     * Stations constructor.
     * @param $station_id
     * @param $name
     * @param $voivodeship
     * @param $city
     * @param $street
     */
    public function __construct($station_id, $name, $voivodeship, $city, $street)
    {
        $this->station_id = $station_id;
        $this->name = $name;
        $this->voivodeship = $voivodeship;
        $this->city = $city;
        $this->street = $street;
    }

    /**
     * @return mixed
     */
    public function getStationId()
    {
        return $this->station_id;
    }

    /**
     * @param mixed $station_id
     */
    public function setStationId($station_id)
    {
        $this->station_id = $station_id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getVoivodeship()
    {
        return $this->voivodeship;
    }

    /**
     * @param mixed $voivodeship
     */
    public function setVoivodeship($voivodeship)
    {
        $this->voivodeship = $voivodeship;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

}
