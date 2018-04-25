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
     * @OneToMany(targetEntity="Stations", mappedBy="reporter")
     * @var Stations[]
     */
    protected $reportedBugs = null;
    /**
     * @OneToMany(targetEntity="Stations", mappedBy="engineer")
     * @var Stations[]
     */
    protected $assignedBugs = null;
    public function __construct()
    {
        $this->reportedBugs = new ArrayCollection();
        $this->assignedBugs = new ArrayCollection();
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
    public function addReportedBug($bug)
    {
        $this->reportedBugs[] = $bug;
    }
    public function assignedToBug($bug)
    {
        $this->assignedBugs[] = $bug;
    }
}