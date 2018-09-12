<?php
namespace Entity;
/**
 * @Entity 
 * @Table(name="Sessionc")
 **/

class Sessionc
{
    /**
     * @Id ()
     * @Column(type="integer")
     * @GeneratedValue()
     */
    private $id;

    /**
     * @Column(type="datetime")
     */
    private $startSessionc;

    /**
     * @Column(type="datetime")
     */
    private $finishSessionc;

    /**
     * Sessionc linked to this Admin
     *
     * @ManyToMany(targetEntity="Entity\Admin", inversedBy="sessionc")
     */
    private $admin;

 	public function getId()
    {
        return $this->id;
    }

    public function getStartSessionc()
    {
        return $this->startSessionc;
    }

    public function setStartSessionc($startSessionc)
    {
        $this->startSessionc = $startSessionc;
    }

    public function getFinishSessionc()
    {
        return $this->finishSessionc;
    }

    public function setFinishSessionc($finishSessionc)
    {
        $this->finishSessionc = $finishSessionc;
    }

    public function getAdmin()
    {
        return $this->admin;
    }

    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }    

}
