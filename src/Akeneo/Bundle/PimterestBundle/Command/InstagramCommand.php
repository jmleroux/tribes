<?php

namespace Akeneo\Bundle\PimterestBundle\Command;

use Akeneo\Bundle\PimterestBundle\Document\Contribution;
use Akeneo\Bundle\PimterestBundle\Instagram\InstagramReader;
use Akeneo\Bundle\PimterestBundle\Repository\ContributionRepository;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author    Adrien Pétremann <adrien.petremann@akeneo.com>
 * @copyright 2015 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class InstagramCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('pimterest:instagram:read')->setDescription('Read instagram API');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $reader = $this->getInstagramReader();
        $data = $reader->retrieve();

        foreach($data as $contributionData) {
            dump($contributionData);
            $contribution = new Contribution($contributionData);
            $search = [
                'appId' => $contribution->getAppId(),
                'source' => $contribution->getSource()
            ];

            if (!$this->getContributionRepository()->findOneBy($search)) {
                var_dump($contribution);
                $this->getDocumentManager()->persist($contribution);
                $this->getDocumentManager()->flush();
            }
        }

        $output->writeln('<info>Done!</info>');
    }

    /**
     * @return InstagramReader
     */
    protected function getInstagramReader()
    {
        return $this->getContainer()->get('pimterest.reader.instagram');
    }

    /**
     * @return ContributionRepository
     */
    protected function getContributionRepository()
    {
        return $this->getContainer()->get('pimterest.repository.contribution');
    }

    /**
     * @return DocumentManager
     */
    protected function getDocumentManager()
    {
        return $this->getContainer()->get('doctrine.odm.mongodb.document_manager');
    }
}