<?php
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity @Table(name="users")
 */
class User
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var string
     */
    protected $user_id;
    protected $login;
    protected $passwd;
    protected $name;
    protected $mail;
    protected $register_date;
    protected $group_id;
    protected $info;
    protected $token;
    protected $company;

    /**
     * User constructor.
     * @param string $user_id
     * @param string $login
     * @param Stations[] $passwd
     * @param $name
     * @param $mail
     * @param $register_date
     * @param $group_id
     * @param $info
     */
    public function __construct($user_id, $login, array $passwd, $name, $mail, $register_date, $group_id, $info, $token, $company)
    {
        $this->user_id = $user_id;
        $this->login = $login;
        $this->passwd = $passwd;
        $this->name = $name;
        $this->mail = $mail;
        $this->register_date = $register_date;
        $this->group_id = $group_id;
        $this->info = $info;
        $this->token = $token;
        $this->company = $company;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
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

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param string $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return array|Stations[]
     */
    public function getPasswd()
    {
        return $this->passwd;
    }

    /**
     * @param array|Stations[] $passwd
     */
    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;
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
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getRegisterDate()
    {
        return $this->register_date;
    }

    /**
     * @param mixed $register_date
     */
    public function setRegisterDate($register_date)
    {
        $this->register_date = $register_date;
    }

    /**
     * @return mixed
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * @param mixed $group_id
     */
    public function setGroupId($group_id)
    {
        $this->group_id = $group_id;
    }

    /**
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param mixed $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }



}