<?php

namespace App\Controller;

use App\Entity\Annonces;
use App\Form\AnnoncesType;
use App\Repository\AnnoncesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Validator\ValidatorInterface;

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
        $repository = $this->getDoctrine()->getRepository(Annonces::class);

        // query for a single Product by its primary key (usually "id")
        $annonce = $repository->findall();

        return View::create($annonce, Response::HTTP_OK , []);
    }

    /**
     * @Route("/new", name="annonces_new", methods={"POST"}, defaults={"_format": "json"})
     */
    public function new(Request $request,ValidatorInterface $validator)
    {
        $annonce = new Annonces();
        $annonce->setSiren($request->get('Siren'));
        $annonce->setNic($request->get('Nic'));
        $annonce->setCommentaires($request->get('Commentaires'));
        $annonce->setDep($request->get('Dep'));
        $annonce->setCreatedAt($request->get('CreatedAt'));

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
