<?php

namespace Sisaf\SisafBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstadoFinanciero
 */
class EstadoFinanciero
{
    /**
     * @ORM\ManyToOne(targetEntity="Ingresos", inversedBy="estadofinanciero")
     * @ORM\JoinColumn(name="id", referencedColumnName="Monto")
     */
    protected $categoria;

    /**
     * @var integer
     */
    private $id;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
