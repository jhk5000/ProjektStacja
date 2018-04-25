<?php

class Companies
{
    protected $Users_user_id;
    protected $company;

    /**
     * Companies constructor.
     * @param $Users_user_id
     * @param $company
     */
    public function __construct($Users_user_id, $company)
    {
        $this->Users_user_id = $Users_user_id;
        $this->company = $company;
    }

    /**
     * @return mixed
     */
    public function getUsersUserId()
    {
        return $this->Users_user_id;
    }

    /**
     * @param mixed $User_user_id
     */
    public function setUsersUserId($Users_user_id)
    {
        $this->Users_user_id = $Users_user_id;
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }
}