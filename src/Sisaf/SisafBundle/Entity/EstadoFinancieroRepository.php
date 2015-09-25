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
class EstadoFinancieroRepository extends EntityRepository
{

public function sumIngresos() {
        $em = $this->getEntityManager();
        $dql = "select SUM(i.MontoPagado) total
            from SisafBundle:Ingresos i
             ";//group by p.id

        $query = $em->createQuery($dql);
        //$query->setParameter('id', $id);
        $producto = $query->getArrayResult();
       // echo '<pre>';print_r($producto);echo '</pre>';
        return $producto[0]['total'];
     }

public function sumGastos() {
        $em = $this->getEntityManager();
        $dql = "select SUM(g.Monto) total
            from SisafBundle:Gastos g
             ";//group by p.id

        $query = $em->createQuery($dql);
        //$query->setParameter('id', $id);
        $producto = $query->getArrayResult();
       // echo '<pre>';print_r($producto);echo '</pre>';
        return $producto[0]['total'];
     }

public function getCuotasUser($vecino) {
        $em = $this->getEntityManager();
        $dql = "select c.id,c.Descripcion, c.monto
            from SisafBundle:Cuotas c 
            where c.id in (select cv.cuota from SisafBundle:cuotaVecino cv where cv.vecino=:vecino )
             ";//group by p.id

        $query = $em->createQuery($dql);
        $query->setParameter('vecino', $vecino);
        $result = $query->getArrayResult();
       // echo '<pre>';print_r($producto);echo '</pre>';
        return $result;
     }
public function setCuotaUser($vecino,$cuota,$monto,$pago) {
        $em = $this->getEntityManager();
        $cuotaVecino = $em->getRepository('SisafBundle:cuotaVecino')->findOneBy(
                                            array('vecino' => $vecino, 'cuota' => $cuota)
                                            );
        $estado=2;
        if($cuotaVecino->getEstado()>0){
            $porcentaje=$cuotaVecino->getEstado()/100;
            $monto=$monto*$porcentaje;
        }
            if($monto==$pago){
                $cuotaVecino->setEstado(100);
            }
            if($monto < $pago){
                $cuotaVecino->setEstado(100);
                $estado=1;
                //
            }
            if($monto > $pago){
                $porcentaje=$monto/100;
                $porcentaje=$pago/$monto;
                $cuotaVecino->setEstado($porcentaje);
            }

            $em->persist($cuotaVecino);
            $em->flush();
        
       // echo '<pre>';print_r($producto);echo '</pre>';
        return $estado;
     }
    
}
