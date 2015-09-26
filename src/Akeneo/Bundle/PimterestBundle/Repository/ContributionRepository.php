<?php

namespace Akeneo\Bundle\PimterestBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

/**
 * @author    Adrien Pétremann <adrien.petremann@akeneo.com>
 * @copyright 2015 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class ContributionRepository extends DocumentRepository
{
    public function findAllOrderedByDate()
    {
        return $this->createQueryBuilder()
            ->sort('id', 'DESC')
            ->getQuery()
            ->execute();
    }
}
