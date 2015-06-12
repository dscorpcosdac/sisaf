<?php

namespace Sisaf\SisafBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Morosos
 */
class Morosos
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $Persona;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Persona
     *
     * @param string $persona
     * @return Morosos
     */
    public function setPersona($persona)
    {
        $this->Persona = $persona;

        return $this;
    }

    /**
     * Get Persona
     *
     * @return string 
     */
    public function getPersona()
    {
        return $this->Persona;
    }
    /**
     * @var \Sisaf\SisafBundle\Entity\Usuario
     */
    private $usuario;


    /**
     * Set usuario
     *
     * @param \Sisaf\SisafBundle\Entity\Usuario $usuario
     * @return Morosos
     */
    public function setUsuario(\Sisaf\SisafBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Sisaf\SisafBundle\Entity\Usuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
