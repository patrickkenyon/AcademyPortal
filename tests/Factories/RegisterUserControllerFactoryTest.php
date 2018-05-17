<?php

namespace tests\Factories;

use PHPUnit\Framework\TestCase;
use Portal\Factory\RegisterUserControllerFactory;
use Portal\Controller\RegisterUserController;
use Portal\Models\UserModel;
use Psr\Container\ContainerInterface;


class RegisterUserControllerFactoryTest extends TestCase
{
    function testInvoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $user = $this->createMock(UserModel::class);
        $container->method('get')
            ->willReturn($user);

        $factory = new RegisterUserControllerFactory;
        $case = $factory($container);
        $expected = RegisterUserController::class;
        $this->assertInstanceOf($expected, $case);
    }
}