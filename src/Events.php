<?php
/**
 * @Entity @Table(name="event_log")
 */
class Events
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var string
     */
    protected $event_id;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $event_name;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $event_date;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $changer;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $description;

    /**
     * @return string
     */
    public function getEventId(): string
    {
        return $this->event_id;
    }

    /**
     * @param string $event_id
     */
    public function setEventId(string $event_id): void
    {
        $this->event_id = $event_id;
    }

    /**
     * @return string
     */
    public function getChanger(): string
    {
        return $this->changer;
    }

    /**
     * @param string $changer
     */
    public function setChanger(string $changer): void
    {
        $this->changer = $changer;
    }


    /**
     * @return string
     */
    public function getEventName(): string
    {
        return $this->event_name;
    }

    /**
     * @param string $event_name
     */
    public function setEventName(string $event_name): void
    {
        $this->event_name = $event_name;
    }

    /**
     * @return string
     */
    public function getEventDate(): string
    {
        return $this->event_date;
    }

    /**
     * @param string $event_date
     */
    public function setEventDate(string $event_date): void
    {
        $this->event_date = $event_date;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }


}