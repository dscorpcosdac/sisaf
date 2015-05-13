<?php

namespace Sisaf\SisafBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proveedores
 */
class Proveedores
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
    private $RFC;

    /**
     * @var string
     */
    private $Pais;

    /**
     * @var string
     */
    private $Estatus;


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
     * @return Proveedores
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
     * Set RFC
     *
     * @param string $rFC
     * @return Proveedores
     */
    public function setRFC($rFC)
    {
        $this->RFC = $rFC;

        return $this;
    }

    /**
     * Get RFC
     *
     * @return string 
     */
    public function getRFC()
    {
        return $this->RFC;
    }

    /**
     * Set Pais
     *
     * @param string $pais
     * @return Proveedores
     */
    public function setPais($pais)
    {
        $this->Pais = $pais;

        return $this;
    }

    /**
     * Get Pais
     *
     * @return string 
     */
    public function getPais()
    {
        return $this->Pais;
    }

    /**
     * Set Estatus
     *
     * @param string $estatus
     * @return Proveedores
     */
    public function setEstatus($estatus)
    {
        $this->Estatus = $estatus;

        return $this;
    }

    /**
     * Get Estatus
     *
     * @return string 
     */
    public function getEstatus()
    {
        return $this->Estatus;
    }
}
