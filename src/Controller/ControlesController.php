<?php

namespace App\Controller;

use App\Entity\Controles;
use App\Form\ControlesType;
use App\Repository\ControlesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/controles")
 */
class ControlesController extends AbstractController
{
    /**
     * @Route("/", name="controles_index", methods={"GET"})
     */
    public function index(ControlesRepository $controlesRepository): Response
    {
        return $this->render('controles/index.html.twig', [
            'controles' => $controlesRepository->findBy([],['createdAt' => 'desc'])
        ]);
    }

    /**
     * @Route("/new", name="controles_new", methods={"GET","POST"})
     * @Route("/{id}/edit", name="controles_edit", methods={"GET","POST"})
     */
    public function new(Request $request,Controles $controle = null, EntityManagerInterface $em): Response
    {
        if (!$controle) {
            $controle = new Controles();
            $controle->setCreatedAt(new \DateTime('now'));
        }
        $form = $this->createForm(ControlesType::class, $controle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if($controle->getModifiedAt() === null) {
                $controle->setModifiedAt(new \DateTime('now'));
            }
            $em = $this->getDoctrine()->getManager();
            $em->persist($controle);
            $em->flush();

            return $this->redirectToRoute('controles_index',['id' => $controle->getId()]);
        }

        return $this->render('controles/form.html.twig', [
            'controle' => $controle,
            'form' => $form->createView(),
            'editMode' => $controle->getId() !== null
        ]);
    }

    /**
     * @Route("/{id}", name="controles_show", methods={"GET"})
     */
    public function show(Controles $controle): Response
    {
        return $this->render('controles/show.html.twig', [
            'controle' => $controle,
        ]);
    }

    /**
     * @Route("/{id}", name="controles_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Controles $controle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$controle->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($controle);
            $em->flush();
        }

        return $this->redirectToRoute('controles_index');
    }
}
