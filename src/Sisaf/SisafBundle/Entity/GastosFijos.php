<?php

namespace Sisaf\SisafBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GastosFijos
 */
class GastosFijos
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $Nombre;

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
     * Set Nombre
     *
     * @param string $nombre
     * @return GastosFijos
     */
    public function setNombre($nombre)
    {
        $this->Nombre = $nombre;

        return $this;
    }

    /**
     * Get Nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * Set Descripcion
     *
     * @param string $descripcion
     * @return GastosFijos
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
     * @return GastosFijos
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