<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 2018-04-25
 * Time: 14:18
 */

class Logdata
{

    protected $logdata_id;
    protected $Users_user_id;
    protected $log_data;
    protected $valid;

    /**
     * Logdata constructor.
     * @param $logdata_id
     * @param $Users_user_id
     * @param $log_data
     * @param $valid
     */
    public function __construct($logdata_id, $Users_user_id, $log_data, $valid)
    {
        $this->logdata_id = $logdata_id;
        $this->Users_user_id = $Users_user_id;
        $this->log_data = $log_data;
        $this->valid = $valid;
    }

    /**
     * @return mixed
     */
    public function getLogdataId()
    {
        return $this->logdata_id;
    }

    /**
     * @param mixed $logdata_id
     */
    public function setLogdataId($logdata_id)
    {
        $this->logdata_id = $logdata_id;
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
    public function getLogData()
    {
        return $this->log_data;
    }

    /**
     * @param mixed $log_data
     */
    public function setLogData($log_data)
    {
        $this->log_data = $log_data;
    }

    /**
     * @return mixed
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * @param mixed $valid
     */
    public function setValid($valid)
    {
        $this->valid = $valid;
    }



}