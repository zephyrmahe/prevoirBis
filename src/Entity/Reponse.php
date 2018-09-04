<?php
namespace Entity;
/**
 * @Entity 
 * @Table(name="Reponse")
 **/

class Reponse
{
    /**
     * @Id ()
     * @Column(type="integer")
     * @GeneratedValue()
     */
    private $id;

     /**
     * @Column(type="text")
     */
    private $reponse;

    /**
     * Reponse linked to this Scenario
     *
     * @ManyToOne(targetEntity="Entity\Scenario", inversedBy="reponse")
     */
    private $scenario;

 	public function getId()
    {
        return $this->id;
    }

    public function getReponse()
    {
        return $this->reponse;
    }

    public function setReponse($reponse)
    {
        $this->reponse = $reponse;
    }    

    public function getScenario()
    {
        return $this->scenario;
    }

    public function setScenario($scenario)
    {
        $this->scenario = $scenario;
    }
}
