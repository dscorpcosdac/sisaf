<?php

namespace Sisaf\SisafBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departamentos
 */
class Departamentos
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $edificio;

    /**
     * @var string
     */
    private $piso;

    /**
     * @var string
     */
    private $departamento;


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
     * Set edificio
     *
     * @param string $edificio
     * @return Departamentos
     */
    public function setEdificio($edificio)
    {
        $this->edificio = $edificio;
    
        return $this;
    }

    /**
     * Get edificio
     *
     * @return string 
     */
    public function getEdificio()
    {
        return $this->edificio;
    }

    /**
     * Set piso
     *
     * @param string $piso
     * @return Departamentos
     */
    public function setPiso($piso)
    {
        $this->piso = $piso;
    
        return $this;
    }

    /**
     * Get piso
     *
     * @return string 
     */
    public function getPiso()
    {
        return $this->piso;
    }

    /**
     * Set departamento
     *
     * @param string $departamento
     * @return Departamentos
     */
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;
    
        return $this;
    }

    /**
     * Get departamento
     *
     * @return string 
     */
    public function getDepartamento()
    {
        return $this->departamento;
    }
}
