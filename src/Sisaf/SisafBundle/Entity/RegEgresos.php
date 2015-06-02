<?php

namespace Sisaf\SisafBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RegEgresos
 */
class RegEgresos
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $Serie;

    /**
     * @var integer
     */
    private $Folio;

    /**
     * @var string
     */
    private $Fecha;

    /**
     * @var string
     */
    private $Proveedor;

    /**
     * @var string
     */
    private $Nombre;

    /**
     * @var integer
     */
    private $Importe;

    /**
     * @var integer
     */
    private $Pagado;

    /**
     * @var integer
     */
    private $Saldo;

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
     * Set Serie
     *
     * @param integer $serie
     * @return RegEgresos
     */
    public function setSerie($serie)
    {
        $this->Serie = $serie;

        return $this;
    }

    /**
     * Get Serie
     *
     * @return integer 
     */
    public function getSerie()
    {
        return $this->Serie;
    }

    /**
     * Set Folio
     *
     * @param integer $folio
     * @return RegEgresos
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
     * Set Fecha
     *
     * @param string $fecha
     * @return RegEgresos
     */
    public function setFecha($fecha)
    {
        $this->Fecha = $fecha;

        return $this;
    }

    /**
     * Get Fecha
     *
     * @return string 
     */
    public function getFecha()
    {
        return $this->Fecha;
    }

    /**
     * Set Proveedor
     *
     * @param string $proveedor
     * @return RegEgresos
     */
    public function setProveedor($proveedor)
    {
        $this->Proveedor = $proveedor;

        return $this;
    }

    /**
     * Get Proveedor
     *
     * @return string 
     */
    public function getProveedor()
    {
        return $this->Proveedor;
    }

    /**
     * Set Nombre
     *
     * @param string $nombre
     * @return RegEgresos
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
     * Set Importe
     *
     * @param integer $importe
     * @return RegEgresos
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
     * Set Pagado
     *
     * @param integer $pagado
     * @return RegEgresos
     */
    public function setPagado($pagado)
    {
        $this->Pagado = $pagado;

        return $this;
    }

    /**
     * Get Pagado
     *
     * @return integer 
     */
    public function getPagado()
    {
        return $this->Pagado;
    }

    /**
     * Set Saldo
     *
     * @param integer $saldo
     * @return RegEgresos
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

    /**
     * Set Estatus
     *
     * @param string $estatus
     * @return RegEgresos
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
