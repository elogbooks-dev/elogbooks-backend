<?php

namespace AppBundle\Controller;

use AppBundle\Response\Collection;
use FOS\RestBundle\Context\Context;
use FOS\RestBundle\Controller\FOSRestController;
use JMS\Serializer\SerializationContext;
use Knp\Component\Pager\Pagination\AbstractPagination;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AbstractApiController
 * @package AppBundle\Controller
 */
abstract class AbstractApiController extends FOSRestController
{
    /**
     * @param FormInterface $form
     *
     * @return array
     */
    public function getErrors(FormInterface $form)
    {
        $errors = [];
        foreach ($form->getErrors(true, true) as $error) {
            $errors[$error->getOrigin()->getName()] = $error->getMessage();
        }

        return $errors;
    }

    /**
     * @param mixed $data
     * @param int   $status
     *
     * @return Response
     */
    public function returnViewResponse($data, $status = Response::HTTP_OK, array $serializationGroups = ['default'])
    {
        $view = $this->view($data, $status, ['Access-Control-Allow-Origin' => '*']);
        if ($serializationGroups) {
            $context = new Context();
            $context->setGroups($serializationGroups);
            $view->setContext($context);
        }

        return $this->handleView($view);
    }

    /**
     * @param AbstractPagination $pagination
     * @param int                $status
     * @param array              $serializationGroups
     *
     * @return Response
     */
    public function returnCollectionViewResponse(AbstractPagination $pagination, $status = Response::HTTP_OK, array $serializationGroups = ['default'])
    {
        $totalPages = intval($pagination->getTotalItemCount() / $pagination->getItemNumberPerPage());

        if ($pagination->getTotalItemCount() % $pagination->getItemNumberPerPage()) {
            $totalPages++;
        }

        $collection = new Collection(
            $pagination->getItems(),
            $pagination->getTotalItemCount(),
            $pagination->getCurrentPageNumber(),
            $totalPages
        );

        $view = $this->view($collection, $status, ['Access-Control-Allow-Origin' => '*']);

        if ($serializationGroups) {
            $context = new Context();
            $context->setGroups($serializationGroups);
            $view->setContext($context);
        }

        return $this->handleView($view);
    }
}