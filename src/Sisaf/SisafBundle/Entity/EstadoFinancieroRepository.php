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
                $em->persist($cuotaVecino);
                $em->flush();
            }
            if($monto < $pago){
                $cuotaVecino->setEstado(100);
                $em->persist($cuotaVecino);
                $em->flush();
                $sobrante=$pago-$monto;
                $cuotaObj=$em->getRepository('SisafBundle:Cuotas')->find($cuota);

                    $coutaSiguiente=$em->getRepository('SisafBundle:Morosos')->findCuotasPendientes($cuotaObj,$vecino,$cuotaVecino->getId());
                   // echo $sobrante.'|'.$coutaSiguiente['monto'].'<br>';
                    $this->setCuotaUser($vecino,$coutaSiguiente['id'],$coutaSiguiente['monto'],$sobrante);
                
                $estado=1;
                //
            }
            if($monto > $pago){
                $porcentaje=$monto/100;

               // echo $porcentaje.'<br>';
                $porcentaje=($pago/$monto)*100;
                //echo $porcentaje;

                $cuotaVecino->setEstado($porcentaje);
                $em->persist($cuotaVecino);
                $em->flush();
            }

           
        
       // echo '<pre>';print_r($producto);echo '</pre>';
        return $estado;
     }

public function setFechaUser($dias,$tiempo,$recorrido,$fechaI){
    ///echo $fechaI->format('Y-m-d').'<br>';
    switch ($tiempo) {
        case 1:
            $fechaI->add(new \DateInterval('P'.$dias.'D'));echo 'P'.$dias.'D';
            break;
        case 2:
            $fechaI->add(new \DateInterval('P'.$dias.'M'));echo 'P'.$dias.'M';
            break;
        case 3:
            $fechaI->add(new \DateInterval('P'.$dias.'Y'));echo 'P'.$dias.'Y';
            break;
       
    }
    echo $fechaI->format('Y-m-d').'<br>';
    if($recorrido > 0){

        switch ($fechaI->format('l') ) {
            case 'Sunday':
                    if($recorrido=1){
                        $fechaI->add(new \DateInterval('P1D'));
                    }
                    if($recorrido=2){
                        $fechaI->diff(new \DateInterval('P2D'));
                    }
                break;
            case 'Saturday':
                if($recorrido=1){
                        $fechaI->add(new \DateInterval('P2D'));
                    }
                    if($recorrido=2){
                        $fechaI->diff(new \DateInterval('P1D'));
                    }
                break;
            
        }
    }
echo $fechaI->format('Y-m-d');
    return $fechaI;
}

public function getUserCuota($cuota) {
        $em = $this->getEntityManager();
        $dql = "select cv.vecino 
                from SisafBundle:cuotaVecino cv 
                where cv.cuota=:cuota";

        $query = $em->createQuery($dql);
        $query->setParameter('cuota', $cuota);
        $result = $query->getArrayResult();
       // echo '<pre>';print_r($producto);echo '</pre>';
        return $result;
     }

    
}
