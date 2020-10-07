<?php

namespace App\Controller;

use App\Entity\Table;
use App\Form\TableChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/table", name="table")
 */
class TableController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('table/index.html.twig', [
            'controller_name' => 'TableController',
        ]);
    }

    /**
     * @Route("/print", name="print")
     */
    public function print(Request $request)
    {
        $method = $request->getMethod();

        if ($method == 'GET') {
            $n = $request->get('n');
        } else {
            $table_choice = $request->get('table_choice');
            $n = $table_choice['table_number'];
        }

        $table = new Table($n);

        return $this->render('table/print.html.twig', [
            'n' => $n,        
            'values' => $table->calcTable(),
        ]);
    }

    /**
     * @Route("/select")
     */
    public function select(Request $request)
    {
        $form = $this->createForm(TableChoiceType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $data = $form->getData();
            $ret['n'] = $data['table_number'];
            $response = $this->redirectToRoute('tableprint', $ret);
        } else {
            $response = $this->render('table/select.html.twig', [
                'formulaire' => $form->createView(),
            ]);
        }
        return $response;
    }

    /**
     * @Route("/select2")
     */
    public function select2(Request $request)
    {
        $form = $this->createForm(TableChoiceType::class, null, 
            [
                'method' => 'POST',
                'action' => '/table/print'
            ]
        );
        $form->handleRequest($request);
        dump($request->getMethod());
        if ($form->isSubmitted()) {
            $data = $form->getData();
            $ret['n'] = $data['table_number'];
            $response = $this->redirectToRoute('tableprint', $ret);
        } else {
            $response = $this->render('table/select.html.twig', [
                'formulaire' => $form->createView(),
            ]);
        }
        return $response;
    }

}
