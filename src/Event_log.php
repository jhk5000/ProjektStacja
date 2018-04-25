<?php
/**
 * @Entity @Table(name="products")
 */
class Eventlog
{
    protected $event_id;
    protected $Users_user_id;
    protected $name;
    protected $date;
    protected $description;

    /**
     * Eventlog constructor.
     * @param $event_id
     * @param $Users_user_id
     * @param $name
     * @param $date
     * @param $description
     */
    public function __construct($event_id, $Users_user_id, $name, $date, $description)
    {
        $this->event_id = $event_id;
        $this->Users_user_id = $Users_user_id;
        $this->name = $name;
        $this->date = $date;
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getEventId()
    {
        return $this->event_id;
    }

    /**
     * @param mixed $event_id
     */
    public function setEventId($event_id)
    {
        $this->event_id = $event_id;
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
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


}