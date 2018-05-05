<?php
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity(repositoryClass="BugRepository") @Table(name="bugs")
 */
class Bug
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     */
    protected $id;
    /**
     * @Column(type="string")
     */
    protected $description;
    /**
     * @Column(type="datetime")
     */
    protected $created;
    /**
     * @Column(type="string")
     */
    protected $status;
    /**
     * @ManyToOne(targetEntity="User", inversedBy="assignedBugs")
     */
    protected $engineer;
    /**
     * @ManyToOne(targetEntity="User", inversedBy="reportedBugs")
     */
    protected $reporter;
    /**
     * @ManyToMany(targetEntity="Stations")
     */
    protected $stations;
    public function __construct()
    {
        $this->stations = new ArrayCollection();
    }
    public function getId()
    {
        return $this->id;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setCreated(DateTime $created)
    {
        $this->created = $created;
    }
    public function getCreated()
    {
        return $this->created;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
    public function getStatus()
    {
        return $this->status;
    }
    public function setEngineer($engineer)
    {
        $engineer->assignedToBug($this);
        $this->engineer = $engineer;
    }
    public function setReporter($reporter)
    {
        $reporter->addReportedBug($this);
        $this->reporter = $reporter;
    }
    public function getEngineer()
    {
        return $this->engineer;
    }
    public function getReporter()
    {
        return $this->reporter;
    }
    public function assignToStation($station)
    {
        $this->stations[] = $station;
    }
    public function getStations()
    {
        return $this->stations;
    }
    public function close()
    {
        $this->status = "CLOSE";
    }
    public function funkcja()
    {
        $this->status = "CLOSE";
    }

}