<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Estado;
use AppBundle\Entity\Local;
use AppBundle\Form\EstadoType;
use AppBundle\Form\LocalType;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;

class EstadoController extends Controller
{
    /**
     * @Route("/estados", name="mostrar_estados")
     */
    public function indexAction()
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $estados = $em->createQueryBuilder()
            ->select('l')
            ->from('AppBundle:Estado','l')
            ->getQuery()
            ->getResult();
        return $this->render('aplicacion/listar_estados.html.twig', [
            'estados' => $estados
        ]);
    }

    /**
     * @Route("/modificar_estado/{id}", name="modificar_estado")
     * @Route("/nuevo_estado", name="nuevo_estado")
     */
    public function formlocalesAction(Request $request, Estado $estado = null)
    {
        $em = $this->getDoctrine()->getManager();

        if (null === $estado) {
            $estado= new Estado();
            $em->persist($estado);
        }

        $form = $this->createForm(EstadoType::class, $estado);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            try {
                $em->flush();
                $this->addFlash('estado', 'Cambios guardados con éxito');
                return $this->redirectToRoute('mostrar_estados');
            }
            catch(\Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios');
            }

        }

        return $this->render('aplicacion/form_estados.html.twig', [
            'estado' => $estado,
            'formulario' => $form->createView()
        ]);
    }

}
