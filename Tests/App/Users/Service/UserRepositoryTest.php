<?php

declare(strict_types=1);

namespace Tests\App\Users\Service;

use App\Users\Repository\UserRepository;
use PHPUnit\Framework\TestCase;

class UserRepositoryTest extends TestCase
{
    public function testListUsersService(): void
    {
        $userRepository = new UserRepository();

        $result = $userRepository->showUsersRepository();
        $this->assertNotEquals([], $result);
    }
}
