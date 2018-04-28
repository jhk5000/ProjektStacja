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
    /**
     * @Column(type="string")
     * @var string
     */
    protected $login;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $passwd;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $name;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $mail;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $register_date;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $group_id;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $info;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $token;

    /**
     * @OneToMany(targetEntity="Bug", mappedBy="reporter")
     * @var Bug[]
     */
    protected $reportedBugs = null;
    /**
     * @OneToMany(targetEntity="Bug", mappedBy="engineer")
     * @var Bug[]
     */
    protected $assignedBugs = null;
    public function __construct()
    {
        $this->reportedBugs = new ArrayCollection();
        $this->assignedBugs = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getInfoAboutCustomer($login,$name,$mail,$info,$register_date)
    {
        return $this->login+" "+$this->name+" "+$this->mail+" "+$this->info+" "+$this->register_date;
    }

    /**
     * @return string
     */
    public function getOursCustomersCompanyName()
    {
        return "";
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
     * @return string
     */
    public function getPasswd()
    {
        return $this->passwd;
    }

    /**
     * @param string $passwd
     */
    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getRegisterDate()
    {
        return $this->register_date;
    }

    /**
     * @param string $register_date
     */
    public function setRegisterDate($register_date)
    {
        $this->register_date = $register_date;
    }

    /**
     * @return string
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * @param string $group_id
     */
    public function setGroupId($group_id)
    {
        $this->group_id = $group_id;
    }

    /**
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param string $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }


}