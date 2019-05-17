<?php

namespace App\Controller;

use App\Entity\Torcedor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TorcedoresController extends AbstractController
{
    /**
     * @Route("/", name="torcedores")
     */
    public function index()
    {
        $torcedores = $this->getDoctrine()
            ->getRepository(Torcedor::class)
            ->findAll();

        return $this->render('torcedores/index.html.twig', [
            'controller_name' => 'TorcedoresController',
            'torcedores' => $torcedores
        ]);
    }

    /**
     * @Route("/torcedor/new", name="new_torcedor")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function form(Request $request){
        $torcedor = new Torcedor();

        $form = $this->createFormBuilder($torcedor)
            ->add('nome_torcedor', TextType::class)
            ->add('email', TextType::class)
            ->add('cidade', TextType::class)
            ->add('Enviar', SubmitType::class, ['label' => 'Enviar'])
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $torcedor = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($torcedor);
            $entityManager->flush();
            return $this->redirectToRoute('torcedores');
        }

        return $this->render('torcedores/new.html.twig', [
            'controller_name' => 'TorcedoresController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/torcedor/{id}", methods="DELETE")
     */
    public function delete($id){
        dd($id);
    }
}
