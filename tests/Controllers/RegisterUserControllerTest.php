<?php

namespace Tests\Controllers;

use PHPUnit\Framework\TestCase;
use Portal\Controller\RegisterUserController;
use Portal\Models\UserModel;

class RegisterUserControllerTest extends TestCase
{
    function testConstruct()
    {
        $stub = $this->createMock(UserModel::class);

        $case = new RegisterUserController($stub);
        $expected = RegisterUserController::class;
        $this->assertInstanceOf($expected, $case);
    }
}
