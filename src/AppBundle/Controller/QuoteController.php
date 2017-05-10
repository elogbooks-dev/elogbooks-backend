<?php

namespace AppBundle\Controller;

use AppBundle\Form\FilterType\Model\ListFilter;
use Knp\Component\Pager\Pagination\AbstractPagination;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Quote;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/quote")
 */
class QuoteController extends AbstractApiController
{
    /**
     * @Route("/{id}")
     * @Method("GET")
     */
    public function getAction(Quote $quote)
    {
        return $this->returnViewResponse($quote);
    }

    /**
     * @param Request $request
     *
     * @return Response
     *
     * @Route("")
     * @Method("GET")
     */
    public function cgetAction(Request $request)
    {
        $filter = new ListFilter();
        $form = $this->createForm('AppBundle\Form\FilterType\ListFilterType', $filter, ['method' => 'GET']);
        $form->handleRequest($request);

        if ($this->getErrors($form)) {
            return $this->returnViewResponse($this->getErrors($form), Response::HTTP_BAD_REQUEST, $filter->getSerialisationGroups());
        }

        /** @var AbstractPagination $pagination */
        $pagination = $this->get('knp_paginator')->paginate(
            $this
                ->getDoctrine()
                ->getRepository(Quote::class)
                ->filterAndReturnQuery($filter),
            $filter->getPage(),
            $filter->getLimit()
        );

        return $this->returnCollectionViewResponse(
            $pagination,
            Response::HTTP_OK,
            $filter->getSerialisationGroups()
        );
    }

    /**
     * @param Request $request
     *
     * @return Response
     *
     * @Route("")
     * @Method("POST")
     */
    public function postAction(Request $request)
    {
        $quote = new Quote();
        $form = $this->createForm('AppBundle\Form\Type\QuoteType', $quote, ['method' => 'POST']);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($quote);
            $em->flush();

            return $this->returnViewResponse($quote, Response::HTTP_CREATED);
        }

        return $this->returnViewResponse($this->getErrors($form), Response::HTTP_BAD_REQUEST);
    }

    /**
     * @param Request $request
     *
     * @return Response
     *
     * @Route("/{quote}")
     * @Method("PUT")
     */
    public function putAction(Request $request, Quote $quote)
    {
        $form = $this->createForm('AppBundle\Form\Type\QuoteType', $quote, ['method' => 'PUT']);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->returnViewResponse($quote, Response::HTTP_CREATED);
        }

        return $this->returnViewResponse($this->getErrors($form), Response::HTTP_BAD_REQUEST);
    }
}
