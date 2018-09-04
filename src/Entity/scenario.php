<?php
namespace Entity;
/**
 * @Entity 
 * @Table(name="Scenario")
 **/

class Scenario
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
    private $buyFirstName;

    /**
     * @Column(type="string")
     */
    private $buyName;

     	public function getId()
    {
        return $this->id;
    }

    public function getBuyFirstName()
    {
        return $this->buyFirstName;
    }

    public function setbuyFirstName($buyFirstName)
    {
        $this->buyFirstName = $buyFirstName;
    }

    public function getBuyName()
    {
    	return $this->buyName;
    }

    public function setbuyName($buyName)
    {
        $this->buyName = $buyName;
    }
}