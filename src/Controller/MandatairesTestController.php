<?php

namespace App\Controller;

use App\Entity\MandatairesTest;
use App\Form\MandatairesTestType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\View\View;
/**
 * @Route("/mandataires/test")
 */
class MandatairesTestController extends AbstractController
{
    /**
     * @Route("/", name="mandataires_test_index", methods={"GET"}, defaults={"_format": "json"})
     */
    public function index()
    {
        $mandatairesTests = $this->getDoctrine()
            ->getRepository(MandatairesTest::class)
            ->findAll();

        return View::create($mandatairesTests, Response::HTTP_CREATED, []);

    }

    /**
     * @Route("/new", name="mandataires_test_new", methods={"POST"}, defaults={"_format": "json"})
     */
    public function new(Request $request)
    {
        $mandatairesTest = new MandatairesTest();
        $mandatairesTest->setIdentity($request->get('identity'));
        $mandatairesTest->setDateJugement($request->get('zipcode'));
        $mandatairesTest->setDep($request->get('dep'));
        $mandatairesTest->setZipcode($request->get('siren'));
        $mandatairesTest->setAdresse($request->get('adresse'));


        $em = $this->getDoctrine()->getManager();
        $em->persist($mandatairesTest);
        $em->flush();
        return View::create($mandatairesTest, Response::HTTP_CREATED , []);

    }

    /**
     * @Route("/{id}", name="mandataireshow", methods={"GET"}, defaults={"_format": "json"})
     */
    public function show($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $mandatairesTests = $entityManager->getRepository(MandatairesTest::class)->find($id);

        return View::create($mandatairesTests, Response::HTTP_OK , []);

    }



}
