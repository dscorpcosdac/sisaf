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
    private $Descripcion;

    /**
     * @var \DateTime
     */
    private $fechaDeInicio;

    /**
     * @var \DateTime
     */
    private $fechaFinal;

    /**
     * @var integer
     */
    private $diasRecurrencia;

    /**
     * @var integer
     */
    private $diaproximo;

    /**
     * @var string
     */
    private $monto;

    /**
     * @var integer
     */
    private $tipo;


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
     * Set fechaDeInicio
     *
     * @param \DateTime $fechaDeInicio
     * @return Cuotas
     */
    public function setFechaDeInicio($fechaDeInicio)
    {
        $this->fechaDeInicio = $fechaDeInicio;

        return $this;
    }

    /**
     * Get fechaDeInicio
     *
     * @return \DateTime 
     */
    public function getFechaDeInicio()
    {
        return $this->fechaDeInicio;
    }

    /**
     * Set fechaFinal
     *
     * @param \DateTime $fechaFinal
     * @return Cuotas
     */
    public function setFechaFinal($fechaFinal)
    {
        $this->fechaFinal = $fechaFinal;

        return $this;
    }

    /**
     * Get fechaFinal
     *
     * @return \DateTime 
     */
    public function getFechaFinal()
    {
        return $this->fechaFinal;
    }

    /**
     * Set diasRecurrencia
     *
     * @param integer $diasRecurrencia
     * @return Cuotas
     */
    public function setDiasRecurrencia($diasRecurrencia)
    {
        $this->diasRecurrencia = $diasRecurrencia;

        return $this;
    }

    /**
     * Get diasRecurrencia
     *
     * @return integer 
     */
    public function getDiasRecurrencia()
    {
        return $this->diasRecurrencia;
    }

    /**
     * Set diaproximo
     *
     * @param integer $diaproximo
     * @return Cuotas
     */
    public function setDiaproximo($diaproximo)
    {
        $this->diaproximo = $diaproximo;

        return $this;
    }

    /**
     * Get diaproximo
     *
     * @return integer 
     */
    public function getDiaproximo()
    {
        return $this->diaproximo;
    }

    /**
     * Set monto
     *
     * @param string $monto
     * @return Cuotas
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Get monto
     *
     * @return string 
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set tipo
     *
     * @param integer $tipo
     * @return Cuotas
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return integer 
     */
    public function getTipo()
    {
        return $this->tipo;
    }
}