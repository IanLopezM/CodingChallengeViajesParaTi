<?php

namespace App\Controller;

use App\Entity\Supplier;
use App\Form\SupplierType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SupplierController extends AbstractController
{
    /**
     * @Route("/", name="app_supplier")
     */
    public function index(): Response
    {
        $data = $this->getDoctrine()->getRepository(Supplier::class)->findAll();




        return $this->render('supplier/index.html.twig', [
            'suppliers' => $data
        ]);
    }

    /**
     * @Route("create", name="create")
     */
    public function create(Request $request) {
        $supplier = new Supplier();
        $form = $this->createForm(SupplierType::class, $supplier);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $userExists = $em->getRepository(Supplier::class)->findBy(['mail'=>$supplier->getMail()]);

            if ($userExists == null) {
                $em->persist($supplier);
                $em->flush();
                return $this->redirectToRoute('app_supplier');
            } else {
                $this->addFlash('notice','Este proveedor ya ha sido registrado previamente!');
            }
        }

        return $this->render('supplier/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/update/{id}", name="update")
     */
    public function update(Request $request, $id) {
        $supplier = $this->getDoctrine()->getRepository(Supplier::class)->find($id);
        $form = $this->createForm(SupplierType::class, $supplier);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $userExists = $em->getRepository(Supplier::class)->findBy(['mail'=>$supplier->getMail()]);

            if ($userExists != null) {
                if ($userExists[0]->getId() == $supplier->getId()) {
                    $em->persist($supplier);
                    $em->flush();
                    return $this->redirectToRoute('app_supplier');
                } else {
                    $this->addFlash('notice','Este correo pertenece a otro empleado!');
                }
            } else {
                $this->addFlash('notice','Este proveedor ya ha sido registrado previamente!');
            }
        }

        return $this->render('supplier/update.html.twig', [
            'form' => $form->createView()
        ]);
    }

     /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(Request $request, $id) {
        
    }
}
