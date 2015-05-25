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
     * @var \DateTime
     */
    private $Fecha;

    /**
     * @var string
     */
    private $Tipo;

    /**
     * @var string
     */
    private $Concepto;

    /**
     * @var integer
     */
    private $Monto;

    /**
     * @var integer
     */
    private $Abono;


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
     * Set Concepto
     *
     * @param string $concepto
     * @return Cuotas
     */
    public function setConcepto($concepto)
    {
        $this->Concepto = $concepto;

        return $this;
    }

    /**
     * Get Concepto
     *
     * @return string 
     */
    public function getConcepto()
    {
        return $this->Concepto;
    }

    /**
     * Set Monto
     *
     * @param integer $monto
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
     * @return integer 
     */
    public function getMonto()
    {
        return $this->Monto;
    }

    /**
     * Set Abono
     *
     * @param integer $abono
     * @return Cuotas
     */
    public function setAbono($abono)
    {
        $this->Abono = $abono;

        return $this;
    }

    /**
     * Get Abono
     *
     * @return integer 
     */
    public function getAbono()
    {
        return $this->Abono;
    }
}
