<?php
/**
 * @Entity @Table(name="stations")
 */
class Stations
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var string
     */
    protected $station_id;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $station_name;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $voivodeship;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $city;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $street;

    /**
     * @return string
     */
    public function getStationId()
    {
        return $this->station_id;
    }

    /**
     * @param string $station_id
     */
    public function setStationId($station_id)
    {
        $this->station_id = $station_id;
    }

    /**
     * @return string
     */
    public function getStationName()
    {
        return $this->station_name;
    }

    /**
     * @param string $station_name
     */
    public function setStationName(string $station_name)
    {
        $this->station_name = $station_name;
    }

    /**
     * @return string
     */
    public function getVoivodeship()
    {
        return $this->voivodeship;
    }

    /**
     * @param string $voivodeship
     */
    public function setVoivodeship($voivodeship)
    {
        $this->voivodeship = $voivodeship;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

}
