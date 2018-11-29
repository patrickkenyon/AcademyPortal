<?php

namespace Tests\Factories;

use Interop\Container\ContainerInterface;
use PHPUnit\Framework\TestCase;
use Portal\Factories\ApplicantModelFactory;
use Portal\Models\ApplicantModel;

class ApplicantModelFactoryTest extends TestCase
{
    function testInvoke()
    {
        $db = $this->createMock(\PDO::class);
        $container = $this->createMock(ContainerInterface::class);
        $container->method('get')
            ->willReturn($db);

        $factory = new ApplicantModelFactory;
        $case = $factory($container);
        $expected = ApplicantModel::class;
        $this->assertInstanceOf($expected, $case);
    }

}
