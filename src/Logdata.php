<?php
/**
 * @Entity @Table(name="logdata")
 */
class Logdata
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var string
     */
    protected $logdata_id;
    /**
     * @Column(type="integer")
     * @var string
     */
    protected $Users_user_id;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $log_date;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $valid;

    /**
     * @return string
     */
    public function getLogdataId()
    {
        return $this->logdata_id;
    }

    /**
     * @param string $logdata_id
     */
    public function setLogdataId($logdata_id)
    {
        $this->logdata_id = $logdata_id;
    }

    /**
     * @return string
     */
    public function getUsersUserId()
    {
        return $this->Users_user_id;
    }

    /**
     * @param string $Users_user_id
     */
    public function setUsersUserId($Users_user_id)
    {
        $this->Users_user_id = $Users_user_id;
    }

    /**
     * @return string
     */
    public function getLogDate()
    {
        return $this->log_date;
    }

    /**
     * @param string $log_date
     */
    public function setLogDate($log_date)
    {
        $this->log_date = $log_date;
    }

    /**
     * @return string
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * @param string $valid
     */
    public function setValid($valid)
    {
        $this->valid = $valid;
    }


}