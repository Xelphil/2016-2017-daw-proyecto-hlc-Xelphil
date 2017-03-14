<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Local;
use AppBundle\Form\LocalType;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;

class LocalesController extends Controller
{
    /**
     * @Route("/", name="mostrar_locales")
     */
    public function indexAction()
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $locales = $em->createQueryBuilder()
            ->select('l')
            ->from('AppBundle:Local','l')
            ->getQuery()
            ->getResult();
        return $this->render('aplicacion/listar_locales.html.twig', [
            'locales' => $locales
        ]);
    }

    /**
     * @Route("/nuevo", name="nuevo_local", methods={"GET", "POST"})
     * @Route("/modificar/{id}", name="modificar_local", methods={"GET", "POST"})
     */
    public function formlocalesAction(Request $request, Local $local = null)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        if (null == $local) {
            $local = new Local();
            $em->persist($local);
        }

        $form = $this->createForm(LocalType::class, $local);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em->flush();
                $this->addFlash('estado', 'Cambios guardados con éxito');
                return $this->redirectToRoute('mostrar_locales');
            }
            catch(Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios');
            }

        }

        return $this->render('aplicacion/listar_locales.html.twig', [
            'local' => $local,
            'formulario' => $form->createView()
        ]);
    }

    /**
     * @Route("/eliminar/{id}", name="borrar_local", methods={"GET"})
     */
    public function borrarAction(Local $local)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        return $this->render('aplicacion/borrar_locales.html.twig', [
            'local' => $local
        ]);
    }

    /**
     * @Route("/eliminar/{id}", name="confirmar_borrar_local", methods={"POST"})
     */
    public function borrarDeVerdadAction(Local $local)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        try {
            foreach($local->getNombre() as $nombre) {
                $em->remove($nombre);
            }
            $em->remove($local);
            $em->flush();
            $this->addFlash('estado', 'Local eliminado con éxito');
        }
        catch(Exception $e) {
            $this->addFlash('error', 'No se han podido eliminar');
        }

        return $this->redirectToRoute('mostrar_locales');
    }

}
