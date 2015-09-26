<?php

namespace Akeneo\Bundle\PimterestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MapController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Pimterest/map/index.html.twig');
    }
}
