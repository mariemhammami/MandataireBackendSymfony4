<?php

namespace App\Controller;

use App\Entity\Annonces;
use App\Form\AnnoncesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\View\View;
/**
 * @Route("/annonces")
 */
class AnnoncesController extends AbstractController
{
    /**
     * @Route("/", name="annonces_index", methods={"GET"}, defaults={"_format": "json"})
     */
    public function index()
    {
        $annonces = $this->getDoctrine()
            ->getRepository(Annonces::class)
            ->findAll();

        return View::create($annonces, Response::HTTP_OK , []);
    }

    /**
     * @Route("/new", name="annonces_new", methods={"POST"}, defaults={"_format": "json"})
     */
    public function new(Request $request)
    {
        $annonce = new Annonces();
        $annonce->setAnnonceId($request->get('annonce_id'));
        $annonce->setDateJugement($request->get('date_jugement'));
        $annonce->setSiren($request->get('siren'));
        $annonce->setNic($request->get('nic'));
        $annonce->setCommentaires($request->get('commentaires'));
        $annonce->setDep($request->get('dep'));
        $annonce->setCreatedAt($request->get('created_at'));

        $em = $this->getDoctrine()->getManager();
        $em->persist($annonce);
        $em->flush();
        return View::create($annonce, Response::HTTP_CREATED , []);

    }

    /**
     * @Route("/{id}", name="annonces_show", methods={"GET"}, defaults={"_format": "json"})
     */
    public function show($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $annonce = $entityManager->getRepository(Annonces::class)->find($id);

        return View::create($annonce, Response::HTTP_OK , []);

    }


}
