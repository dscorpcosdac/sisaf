<?php

namespace Sisaf\SisafBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * 
 * ProductoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MorososRepository extends EntityRepository
{

public function findCuotasUser($conn ) {

        
        $em = $this->getEntityManager();
        $dql = "select c.id,c.Descripcion, c.monto,c.fechaDeInicio,v.*
            from Cuotas as c
            inner join cuotaVecino as cv on c.id=cv.cuota
            inner join Usuario as v on cv.vecino=v.id
            where cv.estado < 99";//group by p.id

       $morosos = $conn->fetchAll( $dql );
       //echo '<pre>';print_r($morosos);echo '</pre>';
       return $morosos;
     }

}