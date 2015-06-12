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
     * @var string
     */
    private $Telefono;

    /**
     * @var string
     */
    private $Residencia;


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
     * @param string $telefono
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
     * @return string 
     */
    public function getTelefono()
    {
        return $this->Telefono;
    }

    /**
     * Set Residencia
     *
     * @param string $residencia
     * @return Morosos
     */
    public function setResidencia($residencia)
    {
        $this->Residencia = $residencia;

        return $this;
    }

    /**
     * Get Residencia
     *
     * @return string 
     */
    public function getResidencia()
    {
        return $this->Residencia;
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
