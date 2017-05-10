<?php

namespace AppBundle\Repository;

use AppBundle\Form\FilterType\Model\ListFilter;
use AppBundle\Form\FilterType\Model\JobFilter;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * Class JobRepository
 * @package AppBundle\Repository
 */
class JobRepository extends EntityRepository
{
    /**
     * @param ListFilter $listFilterModel
     *
     * @return QueryBuilder
     */
    public function filterAndReturnQuery(JobFilter $listFilterModel)
    {
        $qb = $this->createQueryBuilder('j')
            ->setMaxResults(JobFilter::LIMIT)
        ;

        $this->applyFilter($qb, $listFilterModel);

        return $qb->getQuery();
    }

    /**
     * @param QueryBuilder $qb
     * @param ListFilter   $listFilterModel
     *
     * @return $this
     */
    public function applyFilter(QueryBuilder $qb, JobFilter $listFilterModel)
    {

        if ($listFilterModel->getOrderKey()) {
            $qb->orderBy(
                sprintf('j.%s', $listFilterModel->getOrderKey()),
                $listFilterModel->getOrderDirection()
            );
        }

        if($listFilterModel->getPriority())
        {
           $qb
              ->andWhere(sprintf(" j.priority LIKE '%s' ", "%".$listFilterModel->getPriority()."%"));
        }

        if($listFilterModel->getCustomer())
        {
          $qb
            ->andWhere(sprintf(" j.customer = %d ", $listFilterModel->getCustomer()));
        }

        if($listFilterModel->getStatus())
        {
            $qb
                ->andWhere(sprintf(" j.status = '%s' ", $listFilterModel->getStatus()));
        }
        if($listFilterModel->getType())
        {
            $qb
                ->andWhere(sprintf("j.type = '%s' ",$listFilterModel->getType()));
        }

        if($listFilterModel->getDescription())
        {
            $qb
                ->andWhere(sprintf("j.description LIKE '%s'","%".$listFilterModel->getDescription()."%"));
        }

    }
}
