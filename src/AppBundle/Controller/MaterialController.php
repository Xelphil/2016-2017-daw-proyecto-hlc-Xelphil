<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Material;
use AppBundle\Entity\Local;
use AppBundle\Form\MaterialType;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MaterialController extends Controller
{
    /**
     * @Route("/materiales/{id}", name="listar_materiales")
     */
    public function indexmatAction(Local $id)
    {

        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        $materiales = $em->createQueryBuilder()
            ->select('m')
            ->from('AppBundle:Material','m')
            ->where('m.locales = :idlocal')
            ->setParameter('idlocal',$id)
            ->orderBy('m.fechaAlta','DESC')
            ->getQuery()
            ->getResult();
        return $this->render('aplicacion/listar_materiales.html.twig', [
            'materiales' => $materiales
        ]);
    }

    /**
     * @Route("/nuevo_material", name="nuevo_material", methods={"GET", "POST"})
     * @Route("/modificar_material/{id}", name="modificar_material", methods={"GET", "POST"})
     */
    public function formmaterialesAction(Request $request, Material $material = null)
    {
        $em = $this->getDoctrine()->getManager();

        if (null === $material) {
            $material = new Material();
            $em->persist($material);
        }

        $form = $this->createForm(MaterialType::class, $material);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            try {
                $em->flush();
                $this->addFlash('estado', 'Cambios guardados con éxito');
                return $this->redirectToRoute('mostrar_locales');
            }
            catch(\Exception $e) {
                $this->addFlash('error', 'No se han podido guardar los cambios');
            }

        }

        return $this->render('aplicacion/form_materiales.html.twig', [
            'material' => $material,
            'formulario' => $form->createView()
        ]);
    }

    /**
     * @Route("/eliminar_material/{id}", name="borrar_material", methods={"GET"})
     */
    public function borrarmaterialesAction(Material $material)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();

        return $this->render('aplicacion/borrar_materiales.html.twig', [
            'material' => $material
        ]);
    }

    /**
     * @Route("/eliminar_material/{id}", name="confirmar_borrar_material", methods={"POST"})
     */
    public function borrarDeVerdadAction(Material $material)
    {
        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $em->remove($material);
        try {
            $em->flush();
            $this->addFlash('estado', 'Material eliminado con éxito');
        }
        catch(\Exception $e) {
            $this->addFlash('error', 'No se han podido eliminar');
        }

        return $this->redirectToRoute('mostrar_locales');
    }

}