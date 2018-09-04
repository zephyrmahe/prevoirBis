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

    /**
     * Scenario linked to this Reponse
     *
     * @OneToMany(targetEntity="Entity\Reponse", mappedBy="scenario")
     */
    private $reponse; 

     	public function getId()
    {
        return $this->id;
    }

    public function getBuyFirstName()
    {
        return $this->buyFirstName;
    }

    public function setBuyFirstName($buyFirstName)
    {
        $this->buyFirstName = $buyFirstName;
    }

    public function getBuyName()
    {
    	return $this->buyName;
    }

    public function setBuyName($buyName)
    {
        $this->buyName = $buyName;
    }

    public function getReponse()
    {
        return $this->reponse;
    }

    public function setReponse($reponse)
    {
        $this->reponse = $reponse;
    }

}
