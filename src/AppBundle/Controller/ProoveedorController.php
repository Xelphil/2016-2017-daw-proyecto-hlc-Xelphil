<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Estado;
use AppBundle\Entity\Local;
use AppBundle\Entity\Prooveedor;
use AppBundle\Form\EstadoType;
use AppBundle\Form\LocalType;
use AppBundle\Form\ProoveedorType;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;

class ProoveedorController extends Controller
{
    /**
     * @Route("/provedores", name="mostrar_provedores")
     */
    public function indexAction()
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $provedores = $em->createQueryBuilder()
            ->select('l')
            ->from('AppBundle:Prooveedor','l')
            ->getQuery()
            ->getResult();
        return $this->render('aplicacion/listar_provedores.html.twig', [
            'provedores' => $provedores
        ]);
    }

    /**
     * @Route("/modificar_provedor/{id}", name="modificar_provedores")
     * @Route("/nuevo_provedor", name="nuevo_provedor")
     */
    public function formlocalesAction(Request $request, Prooveedor $provedor = null)
    {
        $em = $this->getDoctrine()->getManager();

        if (null === $provedor) {
            $provedor= new Prooveedor();
            $em->persist($provedor);
        }

        $form = $this->createForm(ProoveedorType::class, $provedor);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            try {
                $em->flush();
                $this->addFlash('estado', 'Cambios guardados con éxito');
                return $this->redirectToRoute('mostrar_provedores');
            }
            catch(\Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios');
            }

        }

        return $this->render('aplicacion/form_provedores.html.twig', [
            'provedor' => $provedor,
            'formulario' => $form->createView()
        ]);
    }

}
