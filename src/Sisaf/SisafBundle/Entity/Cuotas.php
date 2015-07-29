<?php

namespace Sisaf\SisafBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Cuotas
 */
class Cuotas
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    public $Persona;

    /**
     * @var string
     */
    private $Tipo;

    /**
     * @var string
     */
    private $Descripcion;

    /**
     * @var \DateTime
     */
    private $Fecha;

    /**
     * @var string
     */
    private $Monto;

    /**
     * @var string
     */
    private $Frecuencia;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->rooms = new \Doctrine\Common\Collections\ArrayCollection();
        //$this->Persona = new ArrayCollection();
    }


    /**
     * Set Persona
     *
     * @param string $persona
     * @return Cuotas
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
     * Set Tipo
     *
     * @param string $tipo
     * @return Cuotas
     */
    public function setTipo($tipo)
    {
        $this->Tipo = $tipo;

        return $this;
    }

    /**
     * Get Tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->Tipo;
    }

    /**
     * Set Descripcion
     *
     * @param string $descripcion
     * @return Cuotas
     */
    public function setDescripcion($descripcion)
    {
        $this->Descripcion = $descripcion;

        return $this;
    }

    /**
     * Get Descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->Descripcion;
    }

    /**
     * Set Fecha
     *
     * @param \DateTime $fecha
     * @return Cuotas
     */
    public function setFecha($fecha)
    {
        $this->Fecha = $fecha;

        return $this;
    }

    /**
     * Get Fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->Fecha;
    }

    /**
     * Set Monto
     *
     * @param string $monto
     * @return Cuotas
     */
    public function setMonto($monto)
    {
        $this->Monto = $monto;

        return $this;
    }

    /**
     * Get Monto
     *
     * @return string 
     */
    public function getMonto()
    {
        return $this->Monto;
    }

    /**
     * Set Frecuencia
     *
     * @param string $frecuencia
     * @return Cuotas
     */
    public function setFrecuencia($frecuencia)
    {
        $this->Frecuencia = $frecuencia;

        return $this;
    }

    /**
     * Get Frecuencia
     *
     * @return string 
     */
    public function getFrecuencia()
    {
        return $this->Frecuencia;
    }

    /**
     * @var \Sisaf\SisafBundle\Entity\Usuario
     */
    private $usuario;


    /**
     * Set usuario
     *
     * @param \Sisaf\SisafBundle\Entity\Usuario $usuario
     * @return Cuotas
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
