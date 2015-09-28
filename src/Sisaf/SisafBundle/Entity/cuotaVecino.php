<?php

namespace Sisaf\SisafBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * cuotaVecino
 */
class cuotaVecino
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $cuota;

    /**
     * @var integer
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
     * Set cuota
     *
     * @param integer $cuota
     * @return cuotaVecino
     */
    public function setCuota($cuota)
    {
        $this->cuota = $cuota;

        return $this;
    }

    /**
     * Get cuota
     *
     * @return integer 
     */
    public function getCuota()
    {
        return $this->cuota;
    }

    /**
     * Set vecino
     *
     * @param integer $vecino
     * @return cuotaVecino
     */
    public function setVecino($vecino)
    {
        $this->vecino = $vecino;

        return $this;
    }

    /**
     * Get vecino
     *
     * @return integer 
     */
    public function getVecino()
    {
        return $this->vecino;
    }
    /**
     * @var string
     */
    private $estado;


    /**
     * Set estado
     *
     * @param string $estado
     * @return cuotaVecino
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
}