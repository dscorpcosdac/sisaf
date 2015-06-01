<?php

namespace Sisaf\SisafBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
    private $Persona;

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
}
