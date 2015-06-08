<?php

namespace Sisaf\SisafBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visitantes
 */
class Visitantes
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
    private $Automovil;

    /**
     * @var string
     */
    private $Destino;

    /**
     * @var \DateTime
     */
    private $F_Entrada;

    /**
     * @var \DateTime
     */
    private $H_Entrada;

    /**
     * @var \DateTime
     */
    private $H_Salida;


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
     * @return Visitantes
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
     * Set Automovil
     *
     * @param string $automovil
     * @return Visitantes
     */
    public function setAutomovil($automovil)
    {
        $this->Automovil = $automovil;

        return $this;
    }

    /**
     * Get Automovil
     *
     * @return string 
     */
    public function getAutomovil()
    {
        return $this->Automovil;
    }

    /**
     * Set Destino
     *
     * @param string $destino
     * @return Visitantes
     */
    public function setDestino($destino)
    {
        $this->Destino = $destino;

        return $this;
    }

    /**
     * Get Destino
     *
     * @return string 
     */
    public function getDestino()
    {
        return $this->Destino;
    }

    /**
     * Set F_Entrada
     *
     * @param \DateTime $fEntrada
     * @return Visitantes
     */
    public function setFEntrada($fEntrada)
    {
        $this->F_Entrada = $fEntrada;

        return $this;
    }

    /**
     * Get F_Entrada
     *
     * @return \DateTime 
     */
    public function getFEntrada()
    {
        return $this->F_Entrada;
    }

    /**
     * Set H_Entrada
     *
     * @param \DateTime $hEntrada
     * @return Visitantes
     */
    public function setHEntrada($hEntrada)
    {
        $this->H_Entrada = $hEntrada;

        return $this;
    }

    /**
     * Get H_Entrada
     *
     * @return \DateTime 
     */
    public function getHEntrada()
    {
        return $this->H_Entrada;
    }

    /**
     * Set H_Salida
     *
     * @param \DateTime $hSalida
     * @return Visitantes
     */
    public function setHSalida($hSalida)
    {
        $this->H_Salida = $hSalida;

        return $this;
    }

    /**
     * Get H_Salida
     *
     * @return \DateTime 
     */
    public function getHSalida()
    {
        return $this->H_Salida;
    }
    /**
     * @var \Sisaf\SisafBundle\Entity\Usuario
     */
    private $category;


    /**
     * Set category
     *
     * @param \Sisaf\SisafBundle\Entity\Usuario $category
     * @return Visitantes
     */
    public function setCategory(\Sisaf\SisafBundle\Entity\Usuario $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Sisaf\SisafBundle\Entity\Usuario 
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * @var \Sisaf\SisafBundle\Entity\Usuario
     */
    private $casa_depto;


    /**
     * Set casa_depto
     *
     * @param \Sisaf\SisafBundle\Entity\Usuario $casaDepto
     * @return Visitantes
     */
    public function setCasaDepto(\Sisaf\SisafBundle\Entity\Usuario $casaDepto = null)
    {
        $this->casa_depto = $casaDepto;

        return $this;
    }

    /**
     * Get casa_depto
     *
     * @return \Sisaf\SisafBundle\Entity\Usuario 
     */
    public function getCasaDepto()
    {
        return $this->casa_depto;
    }
}
