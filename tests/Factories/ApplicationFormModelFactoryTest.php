<?php

use PHPUnit\Framework\TestCase;
use Portal\Factories\ApplicationFormModelFactory;
use Portal\Models\ApplicationFormModel;
use Psr\Container\ContainerInterface;

class ApplicationFormModelFactoryTest extends TestCase
{
    function testInvoke()
    {
        $db = $this->createMock(\PDO::class);
        $container = $this->createMock(ContainerInterface::class);
        $container->method('get')
            ->willReturn($db);

        $factory = new ApplicationFormModelFactory;
        $case = $factory($container);
        $expected = ApplicationFormModel::class;
        $this->assertInstanceOf($expected, $case);
    }

}
