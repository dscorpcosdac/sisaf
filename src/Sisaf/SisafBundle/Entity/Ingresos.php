<?php

namespace Sisaf\SisafBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

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
     * @var \DateTime
     */
    private $Fecha;

    /**
     * @var string
     */
    private $Descripcion;

    /**
     * @var string
     */
    private $MontoPagado;

    /**
     * @var string
     */
    private $estado;

    /**
     * @var \Sisaf\SisafBundle\Entity\Usuario
     */
    private $vecino;


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
     * Set MontoPagado
     *
     * @param string $montoPagado
     * @return Ingresos
     */
    public function setMontoPagado($montoPagado)
    {
        $this->MontoPagado = $montoPagado;
    
        return $this;
    }

    /**
     * Get MontoPagado
     *
     * @return string 
     */
    public function getMontoPagado()
    {
        return $this->MontoPagado;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Ingresos
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set vecino
     *
     * @param \Sisaf\SisafBundle\Entity\Usuario $vecino
     * @return Ingresos
     */
    public function setVecino(\Sisaf\SisafBundle\Entity\Usuario $vecino = null)
    {
        $this->vecino = $vecino;
    
        return $this;
    }

    /**
     * Get vecino
     *
     * @return \Sisaf\SisafBundle\Entity\Usuario 
     */
    public function getVecino()
    {
        return $this->vecino;
    }
}