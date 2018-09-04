<?php
namespace Entity;
/**
 * @Entity 
 * @Table(name="Session")
 **/

class Session
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
    private $startSession;

    /**
     * @Column(type="datetime")
     */
    private $finishSession;

    /**
     * Session linked to this Admin
     *
     * @ManyToMany(targetEntity="Entity\Admin", inversedBy="session")
     */
    private $admin;

    /**
     * Session linked to this User
     *
     * @OneToMany(targetEntity="Entity\User", mappedBy="session")
     */
    private $user;  

 	public function getId()
    {
        return $this->id;
    }

    public function getStartSession()
    {
        return $this->startSession;
    }

    public function setStartSession($startSession)
    {
        $this->startSession = $startSession;
    }

    public function getFinishSession()
    {
        return $this->finishSession;
    }

    public function setFinishSession($finishSession)
    {
        $this->finishSession = $finishSession;
    }

    public function getAdmin()
    {
        return $this->admin;
    }

    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }    

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }


}
