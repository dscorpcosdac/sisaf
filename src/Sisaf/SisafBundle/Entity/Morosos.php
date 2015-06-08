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
     * @var string
     */
    private $Correo;

    /**
     * @var integer
     */
    private $Telefono;

    /**
     * @var string
     */
    private $Recidencia;


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
     * Set Correo
     *
     * @param string $correo
     * @return Morosos
     */
    public function setCorreo($correo)
    {
        $this->Correo = $correo;

        return $this;
    }

    /**
     * Get Correo
     *
     * @return string 
     */
    public function getCorreo()
    {
        return $this->Correo;
    }

    /**
     * Set Telefono
     *
     * @param integer $telefono
     * @return Morosos
     */
    public function setTelefono($telefono)
    {
        $this->Telefono = $telefono;

        return $this;
    }

    /**
     * Get Telefono
     *
     * @return integer 
     */
    public function getTelefono()
    {
        return $this->Telefono;
    }

    /**
     * Set Recidencia
     *
     * @param string $recidencia
     * @return Morosos
     */
    public function setRecidencia($recidencia)
    {
        $this->Recidencia = $recidencia;

        return $this;
    }

    /**
     * Get Recidencia
     *
     * @return string 
     */
    public function getRecidencia()
    {
        return $this->Recidencia;
    }
}
