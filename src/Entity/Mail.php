<?php
namespace Entity;
/**
 * @Entity 
 * @Table(name="Mail")
 **/

class Mail
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
    private $retour;

    /**
     * Mail linked to this Reponse
     *
     * @ManyToOne(targetEntity="Entity\Reponse", inversedBy="Mail")
     */
    private $reponse;

    /**
     * Mail linked to this Scenario
     *
     * @ManyToOne(targetEntity="Entity\Scenario", inversedBy="Mail")
     */
    private $scenario;

    /**
     * Mail linked to this Admin
     *
     * @ManyToOne(targetEntity="Entity\Admin", inversedBy="Mail")
     */
    private $admin;

     	public function getId()
    {
        return $this->id;
    }

    public function getRetour()
    {
        return $this->retour;
    }

    public function setRetour($retour)
    {
        $this->retour = $retour;
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

    public function getAdmin()
    {
        return $this->admin;
    }

    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }

}