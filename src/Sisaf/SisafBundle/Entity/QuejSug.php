<?php

namespace Sisaf\SisafBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuejSug
 */
class QuejSug
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $Titulo;

    /**
     * @var text
     */
    private $Descripcion;

    /**
     * @var \DateTime
     */
    private $Fecha;

    /**
     * @var \DateTime
     */
    private $Hora;


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
     * Set Titulo
     *
     * @param string $titulo
     * @return QuejSug
     */
    public function setTitulo($titulo)
    {
        $this->Titulo = $titulo;

        return $this;
    }

    /**
     * Get Titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->Titulo;
    }

    /**
     * Set Descripcion
     *
     * @param text $descripcion
     * @return QuejSug
     */
    public function setDescripcion($descripcion)
    {
        $this->Descripcion = $descripcion;

        return $this;
    }

    /**
     * Get Descripcion
     *
     * @return text 
     */
    public function getDescripcion()
    {
        return $this->Descripcion;
    }

    /**
     * Set Fecha
     *
     * @param \DateTime $fecha
     * @return QuejSug
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
     * Set Hora
     *
     * @param \DateTime $hora
     * @return QuejSug
     */
    public function setHora($hora)
    {
        $this->Hora = $hora;

        return $this;
    }

    /**
     * Get Hora
     *
     * @return \DateTime 
     */
    public function getHora()
    {
        return $this->Hora;
    }
}
