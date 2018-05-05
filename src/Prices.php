<?php
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
     * @Column(type="integer")
     * @var string
     */
    protected $Stations_station_id;
    /**
     * @Column(type="decimal")
     * @var string
     */
    protected $PB98;
    /**
     * @Column(type="decimal")
     * @var string
     */
    protected $PB95;
    /**
     * @Column(type="decimal")
     * @var string
     */
    protected $OIL;
    /**
     * @Column(type="decimal")
     * @var string
     */
    protected $LPG;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $date_of_change;
    /**
     * @return string
     */
    public function getPriceId(): string
    {
        return $this->price_id;
    }
    /**
     * @param string $price_id
     */
    public function setPriceId(string $price_id): void
    {
        $this->price_id = $price_id;
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
    public function getPB98()
    {
        return $this->PB98;
    }
    /**
     * @param string $PB98
     */
    public function setPB98(string $PB98)
    {
        $this->PB98 = $PB98;
    }
    /**
     * @return string
     */
    public function getPB95()
    {
        return $this->PB95;
    }
    /**
     * @param string $PB95
     */
    public function setPB95(string $PB95)
    {
        $this->PB95 = $PB95;
    }
    /**
     * @return string
     */
    public function getOIL()
    {
        return $this->OIL;
    }
    /**
     * @param string $OIL
     */
    public function setOIL(string $OIL)
    {
        $this->OIL = $OIL;
    }
    /**
     * @return string
     */
    public function getLPG()
    {
        return $this->LPG;
    }
    /**
     * @param string $LPG
     */
    public function setLPG(string $LPG)
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