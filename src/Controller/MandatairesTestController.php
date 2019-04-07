<?php

namespace App\Controller;
use App\Entity\Annonces;
use App\Entity\MandatairesTest;
use App\Form\MandatairesTestType;
use App\Repository\MandatairesTestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Validator\ValidatorInterface;
/**
 * @Route("/mandataires/test")
 */
class MandatairesTestController extends AbstractController
{
    /**
     * @Route("/", name="categories_index", methods={"GET"}, defaults={"_format": "json"})
     */
    public function index(MandatairesTestRepository $mandatairesTestRepository)
    {

        $em = $this->getDoctrine()->getEntityManager();
        $mand = $em->getRepository(MandatairesTest::class)->findAll();
        return View::create($mand, Response::HTTP_CREATED, []);

    }

    /**
     * @Route("/new", name="mand_new", methods={"POST"}, defaults={"_format": "json"})
     */
    public function new(Request $request)
    {
        $mandatairesTest = new MandatairesTest();


        $mandatairesTest->setZipcode($request->get('nom_categories'));
        $mandatairesTest->setDep($request->get('nom_categories'));
        $mandatairesTest->setSiren($request->get('nom_categories'));
        $mandatairesTest->setNic($request->get('nom_categories'));
        $mandatairesTest->setAdresse($request->get('nom_categories'));


        $entityManager = $this->getDoctrine()->getManager();
        $annonces = $entityManager->getRepository(Annonces::class)->find($request->get('id_annonce'));
        $mandatairesTest ->setAnnonce($annonces);
        $em = $this->getDoctrine()->getManager();
        $em->persist($mandatairesTest);
        $em->flush();
        return View::create($mandatairesTest, Response::HTTP_CREATED , []);

    }

    /**
     * @Route("/{id}", name="mandataires_test_show", methods={"GET"})
     */
    public function show($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $mand = $entityManager->getRepository(MandatairesTest::class)->find($id);
        return View::create($mand, Response::HTTP_OK , []);

    }

    }
