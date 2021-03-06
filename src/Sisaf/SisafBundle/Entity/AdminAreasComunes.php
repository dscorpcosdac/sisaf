<?php

namespace Sisaf\SisafBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdminAreasComunes
 */
class AdminAreasComunes
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $Area;

    /**
     * @var string
     */
    private $Tipo;

    /**
     * @var string
     */
    private $Ubicacion;


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
     * Set Area
     *
     * @param string $area
     * @return AdminAreasComunes
     */
    public function setArea($area)
    {
        $this->Area = $area;

        return $this;
    }

    /**
     * Get Area
     *
     * @return string 
     */
    public function getArea()
    {
        return $this->Area;
    }

    /**
     * Set Tipo
     *
     * @param string $tipo
     * @return AdminAreasComunes
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
     * Set Ubicacion
     *
     * @param string $ubicacion
     * @return AdminAreasComunes
     */
    public function setUbicacion($ubicacion)
    {
        $this->Ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get Ubicacion
     *
     * @return string 
     */
    public function getUbicacion()
    {
        return $this->Ubicacion;
    }

    public function __toString()
    {
    return strval($this->Area);
    }
}