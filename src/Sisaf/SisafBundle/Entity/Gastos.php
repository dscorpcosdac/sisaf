<?php

namespace Sisaf\SisafBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gastos
 */
class Gastos
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $Tipo;

    /**
     * @var string
     */
    private $Concepto;

    /**
     * @var string
     */
    private $Descripcion;

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
     * Set Tipo
     *
     * @param string $tipo
     * @return Gastos
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
     * @return Gastos
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
     * Set Descripcion
     *
     * @param string $descripcion
     * @return Gastos
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
     * Set Monto
     *
     * @param string $monto
     * @return Gastos
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
