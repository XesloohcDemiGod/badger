<?php

namespace Badger\TagBundle\Doctrine\Repository;

use Badger\TagBundle\Repository\TagRepositoryInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

/**
 * Doctrine implementation of repository for Tag entities.
 *
 * @author Adrien Pétremann <adrien.petremann@akeneo.com>
 */
class TagRepository extends EntityRepository implements TagRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function findByUniqueIsDefault(array $fields)
    {
        if (false === $fields['isDefault']) {
            return null;
        }

        try {
            return $this
                ->createQueryBuilder('t')
                ->where('t.isDefault = true')
                ->getQuery()
                ->getSingleResult();

        } catch (NoResultException $e) {
            return null;
        }
    }
}