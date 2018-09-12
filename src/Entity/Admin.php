<?php
namespace Entity;
/**
 * @Entity 
 * @Table(name="Admin")
 **/

class Admin
{
    /**
     * @Id ()
     * @Column(type="integer")
     * @GeneratedValue()
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $name;

	/**
     * @Column(type="integer")
     */
    private $access;

    /**
     * @Column(type="string")
     */
    private $password;

    /**
     * Admin linked to this Sessionc
     *
     * @ManyToMany(targetEntity="Entity\Sessionc", mappedBy="admin")
     */
    private $sessionc; 
 	

 	public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAccess()
    {
    	return $this->access;
    }

    public function setAccess($access)
    {
        $this->access = $access;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getSessionc()
    {
        return $this->sessionc;
    }

    public function setSessionc($sessionc)
    {
        $this->sessionc = $sessionc;
    }
}