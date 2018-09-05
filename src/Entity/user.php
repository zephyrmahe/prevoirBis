<?php
namespace Entity;
/**
 * @Entity 
 * @Table(name="User")
 **/

class User
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
     * User linked to this Session
     *
     * @ManyToOne(targetEntity="Entity\Session", inversedBy="user")
     */
    private $session;

    /**
     * User linked to this Mail
     *
     * @OneToMany(targetEntity="Entity\Mail", mappedBy="user")
     */
    private $mail; 
 	
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

    public function getSession()
    {
        return $this->session;
    }

    public function setSession($session)
    {
        $this->session = $session;
    }

    
    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }
}