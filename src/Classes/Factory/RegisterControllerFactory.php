<?php

namespace Portal\Factory;

use Psr\Container\ContainerInterface;
use Portal\Controller\RegisterController;

class RegisterControllerFactory
{
    public function __invoke(ContainerInterface $container) : RegisterController {
        $renderer = $container->get('renderer');
        return new RegisterController($renderer);
    }
}