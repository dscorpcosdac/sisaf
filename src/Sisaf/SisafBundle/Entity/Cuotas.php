<?php

namespace Sisaf\SisafBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Cuotas
 */
class Cuotas
<<<<<<< HEAD
{
   
=======
{   
>>>>>>> a8cfb7fd1de2239305c78222c67776e4b269bdb9
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $Descripcion;

    /**
     * @var \DateTime
     */
    private $fechaDeInicio;

    /**
     * @var \DateTime
     */
    private $fechaFinal;

    /**
<<<<<<< HEAD
     * @var integer
=======
     * @var string
>>>>>>> a8cfb7fd1de2239305c78222c67776e4b269bdb9
     */
    private $diasRecurrencia;

    /**
<<<<<<< HEAD
     * @var integer
=======
     * @var \DateTime
>>>>>>> a8cfb7fd1de2239305c78222c67776e4b269bdb9
     */
    private $diaproximo;

    /**
     * @var string
     */
    private $monto;

    /**
     * @var integer
     */
    private $tipo;

<<<<<<< HEAD
=======
    /**
     * @var integer
     */
    private $padre;

>>>>>>> a8cfb7fd1de2239305c78222c67776e4b269bdb9

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
     * Set Descripcion
     *
     * @param string $descripcion
     * @return Cuotas
     */
    public function setDescripcion($descripcion)
    {
        $this->Descripcion = $descripcion;
<<<<<<< HEAD

=======
    
>>>>>>> a8cfb7fd1de2239305c78222c67776e4b269bdb9
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
     * Set fechaDeInicio
     *
     * @param \DateTime $fechaDeInicio
     * @return Cuotas
     */
    public function setFechaDeInicio($fechaDeInicio)
    {
        $this->fechaDeInicio = $fechaDeInicio;
<<<<<<< HEAD

=======
    
>>>>>>> a8cfb7fd1de2239305c78222c67776e4b269bdb9
        return $this;
    }

    /**
     * Get fechaDeInicio
     *
     * @return \DateTime 
     */
    public function getFechaDeInicio()
    {
        return $this->fechaDeInicio;
    }

    /**
     * Set fechaFinal
     *
     * @param \DateTime $fechaFinal
     * @return Cuotas
     */
    public function setFechaFinal($fechaFinal)
    {
        $this->fechaFinal = $fechaFinal;
<<<<<<< HEAD

=======
    
>>>>>>> a8cfb7fd1de2239305c78222c67776e4b269bdb9
        return $this;
    }

    /**
     * Get fechaFinal
     *
     * @return \DateTime 
     */
    public function getFechaFinal()
    {
        return $this->fechaFinal;
    }

    /**
     * Set diasRecurrencia
     *
<<<<<<< HEAD
     * @param integer $diasRecurrencia
=======
     * @param string $diasRecurrencia
>>>>>>> a8cfb7fd1de2239305c78222c67776e4b269bdb9
     * @return Cuotas
     */
    public function setDiasRecurrencia($diasRecurrencia)
    {
        $this->diasRecurrencia = $diasRecurrencia;
<<<<<<< HEAD

=======
    
>>>>>>> a8cfb7fd1de2239305c78222c67776e4b269bdb9
        return $this;
    }

    /**
     * Get diasRecurrencia
     *
<<<<<<< HEAD
     * @return integer 
=======
     * @return string 
>>>>>>> a8cfb7fd1de2239305c78222c67776e4b269bdb9
     */
    public function getDiasRecurrencia()
    {
        return $this->diasRecurrencia;
    }

    /**
     * Set diaproximo
     *
<<<<<<< HEAD
     * @param integer $diaproximo
=======
     * @param \DateTime $diaproximo
>>>>>>> a8cfb7fd1de2239305c78222c67776e4b269bdb9
     * @return Cuotas
     */
    public function setDiaproximo($diaproximo)
    {
        $this->diaproximo = $diaproximo;
<<<<<<< HEAD

=======
    
>>>>>>> a8cfb7fd1de2239305c78222c67776e4b269bdb9
        return $this;
    }

    /**
     * Get diaproximo
     *
<<<<<<< HEAD
     * @return integer 
=======
     * @return \DateTime 
>>>>>>> a8cfb7fd1de2239305c78222c67776e4b269bdb9
     */
    public function getDiaproximo()
    {
        return $this->diaproximo;
    }

    /**
     * Set monto
     *
     * @param string $monto
     * @return Cuotas
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;
<<<<<<< HEAD

=======
    
>>>>>>> a8cfb7fd1de2239305c78222c67776e4b269bdb9
        return $this;
    }

    /**
     * Get monto
     *
     * @return string 
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Set tipo
     *
     * @param integer $tipo
     * @return Cuotas
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
<<<<<<< HEAD

=======
    
>>>>>>> a8cfb7fd1de2239305c78222c67776e4b269bdb9
        return $this;
    }

    /**
     * Get tipo
     *
     * @return integer 
     */
    public function getTipo()
    {
        return $this->tipo;
    }
<<<<<<< HEAD
=======

    /**
     * Set padre
     *
     * @param integer $padre
     * @return Cuotas
     */
    public function setPadre($padre)
    {
        $this->padre = $padre;
    
        return $this;
    }

    /**
     * Get padre
     *
     * @return integer 
     */
    public function getPadre()
    {
        return $this->padre;
    }
>>>>>>> a8cfb7fd1de2239305c78222c67776e4b269bdb9
}