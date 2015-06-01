<?php

namespace Sisaf\SisafBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ingresos
 */
class Ingresos
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
     * @var \DateTime
     */
    private $Fecha;

    /**
     * @var string
     */
    private $Descripcion;

    /**
     * @var integer
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
     * @return Ingresos
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
     * Set Fecha
     *
     * @param \DateTime $fecha
     * @return Ingresos
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
     * Set Descripcion
     *
     * @param string $descripcion
     * @return Ingresos
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
     * @param integer $monto
     * @return Ingresos
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
}
