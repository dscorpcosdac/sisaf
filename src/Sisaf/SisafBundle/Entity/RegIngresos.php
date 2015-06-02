<?php

namespace Sisaf\SisafBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RegIngresos
 */
class RegIngresos
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $Folio;

    /**
     * @var integer
     */
    private $Persona;

    /**
     * @var string
     */
    private $Nombres;

    /**
     * @var string
     */
    private $Apellidos;

    /**
     * @var integer
     */
    private $Aporte;

    /**
     * @var integer
     */
    private $Periodo;

    /**
     * @var integer
     */
    private $No_Prorrateo;

    /**
     * @var integer
     */
    private $Importe;

    /**
     * @var integer
     */
    private $Saldo;


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
     * Set Folio
     *
     * @param integer $folio
     * @return RegIngresos
     */
    public function setFolio($folio)
    {
        $this->Folio = $folio;

        return $this;
    }

    /**
     * Get Folio
     *
     * @return integer 
     */
    public function getFolio()
    {
        return $this->Folio;
    }

    /**
     * Set Persona
     *
     * @param integer $persona
     * @return RegIngresos
     */
    public function setPersona($persona)
    {
        $this->Persona = $persona;

        return $this;
    }

    /**
     * Get Persona
     *
     * @return integer 
     */
    public function getPersona()
    {
        return $this->Persona;
    }

    /**
     * Set Nombres
     *
     * @param string $nombres
     * @return RegIngresos
     */
    public function setNombres($nombres)
    {
        $this->Nombres = $nombres;

        return $this;
    }

    /**
     * Get Nombres
     *
     * @return string 
     */
    public function getNombres()
    {
        return $this->Nombres;
    }

    /**
     * Set Apellidos
     *
     * @param string $apellidos
     * @return RegIngresos
     */
    public function setApellidos($apellidos)
    {
        $this->Apellidos = $apellidos;

        return $this;
    }

    /**
     * Get Apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->Apellidos;
    }

    /**
     * Set Aporte
     *
     * @param integer $aporte
     * @return RegIngresos
     */
    public function setAporte($aporte)
    {
        $this->Aporte = $aporte;

        return $this;
    }

    /**
     * Get Aporte
     *
     * @return integer 
     */
    public function getAporte()
    {
        return $this->Aporte;
    }

    /**
     * Set Periodo
     *
     * @param integer $periodo
     * @return RegIngresos
     */
    public function setPeriodo($periodo)
    {
        $this->Periodo = $periodo;

        return $this;
    }

    /**
     * Get Periodo
     *
     * @return integer 
     */
    public function getPeriodo()
    {
        return $this->Periodo;
    }

    /**
     * Set No_Prorrateo
     *
     * @param integer $noProrrateo
     * @return RegIngresos
     */
    public function setNoProrrateo($noProrrateo)
    {
        $this->No_Prorrateo = $noProrrateo;

        return $this;
    }

    /**
     * Get No_Prorrateo
     *
     * @return integer 
     */
    public function getNoProrrateo()
    {
        return $this->No_Prorrateo;
    }

    /**
     * Set Importe
     *
     * @param integer $importe
     * @return RegIngresos
     */
    public function setImporte($importe)
    {
        $this->Importe = $importe;

        return $this;
    }

    /**
     * Get Importe
     *
     * @return integer 
     */
    public function getImporte()
    {
        return $this->Importe;
    }

    /**
     * Set Saldo
     *
     * @param integer $saldo
     * @return RegIngresos
     */
    public function setSaldo($saldo)
    {
        $this->Saldo = $saldo;

        return $this;
    }

    /**
     * Get Saldo
     *
     * @return integer 
     */
    public function getSaldo()
    {
        return $this->Saldo;
    }
}
