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
    public function __construct($user_id, $login, array $passwd, $name, $mail, $register_date, $group_id, $info)
    {
        $this->user_id = $user_id;
        $this->login = $login;
        $this->passwd = $passwd;
        $this->name = $name;
        $this->mail = $mail;
        $this->register_date = $register_date;
        $this->group_id = $group_id;
        $this->info = $info;
    }

    public function getId()
    {
        return $this->user_id;
    }
    public function getLogin()
    {
        return $this->login;
    }
    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getPasswd($passwd)
    {
        return $this->passwd;
    }

    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;
    }

}