<?php

namespace Sisaf\SisafBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstadoFinanciero
 */
class EstadoFinanciero
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $Cuotas;

    /**
     * @var string
     */
    private $Ingresos;

    /**
     * @var string
     */
    private $Egresos;

    /**
     * @var string
     */
    private $GastosFijos;

    /**
     * @var string
     */
    private $Presupuestos;


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
     * Set Cuotas
     *
     * @param string $cuotas
     * @return EstadoFinanciero
     */
    public function setCuotas($cuotas)
    {
        $this->Cuotas = $cuotas;

        return $this;
    }

    /**
     * Get Cuotas
     *
     * @return string 
     */
    public function getCuotas()
    {
        return $this->Cuotas;
    }

    /**
     * Set Ingresos
     *
     * @param string $ingresos
     * @return EstadoFinanciero
     */
    public function setIngresos($ingresos)
    {
        $this->Ingresos = $ingresos;

        return $this;
    }

    /**
     * Get Ingresos
     *
     * @return string 
     */
    public function getIngresos()
    {
        return $this->Ingresos;
    }

    /**
     * Set Egresos
     *
     * @param string $egresos
     * @return EstadoFinanciero
     */
    public function setEgresos($egresos)
    {
        $this->Egresos = $egresos;

        return $this;
    }

    /**
     * Get Egresos
     *
     * @return string 
     */
    public function getEgresos()
    {
        return $this->Egresos;
    }

    /**
     * Set GastosFijos
     *
     * @param string $gastosFijos
     * @return EstadoFinanciero
     */
    public function setGastosFijos($gastosFijos)
    {
        $this->GastosFijos = $gastosFijos;

        return $this;
    }

    /**
     * Get GastosFijos
     *
     * @return string 
     */
    public function getGastosFijos()
    {
        return $this->GastosFijos;
    }

    /**
     * Set Presupuestos
     *
     * @param string $presupuestos
     * @return EstadoFinanciero
     */
    public function setPresupuestos($presupuestos)
    {
        $this->Presupuestos = $presupuestos;

        return $this;
    }

    /**
     * Get Presupuestos
     *
     * @return string 
     */
    public function getPresupuestos()
    {
        return $this->Presupuestos;
    }

    /**
     * @var \Sisaf\SisafBundle\Entity\Ingresos
     */
    private $ingresos;


    /**
     * @var \Sisaf\SisafBundle\Entity\Egresos
     */
    private $egresos;


    /**
     * @var \Sisaf\SisafBundle\Entity\Presupuesto
     */
    private $presupuesto;


    /**
     * Set presupuesto
     *
     * @param \Sisaf\SisafBundle\Entity\Presupuesto $presupuesto
     * @return EstadoFinanciero
     */
    public function setPresupuesto(\Sisaf\SisafBundle\Entity\Presupuesto $presupuesto = null)
    {
        $this->presupuesto = $presupuesto;

        return $this;
    }

    /**
     * Get presupuesto
     *
     * @return \Sisaf\SisafBundle\Entity\Presupuesto 
     */
    public function getPresupuesto()
    {
        return $this->presupuesto;
    }
}