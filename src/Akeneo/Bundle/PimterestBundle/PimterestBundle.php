<?php

namespace Akeneo\Bundle\PimterestBundle;

use Akeneo\Bundle\PimterestBundle\Command\InstagramCommand;
use Akeneo\Bundle\PimterestBundle\Command\TwitterCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class PimterestBundle extends Bundle
{
    public function registerCommands(Application $application)
    {
        $application->add(new InstagramCommand());
        $application->add(new TwitterCommand());
    }
}
