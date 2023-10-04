<?php

declare(strict_types=1);

namespace Kernel\Configuration;

use Dotenv\Dotenv;

class Configuration
{
    private static array $ENVIRONMENTS_VARIABLES;
    private static array $ENVIRONMENTS_VARIABLES_FROM_FILE;
    private static array $ENVIRONMENTS_ALL;

    /**
     * @return mixed[]
     */

    private function createEnvironments(): array
    {
        if (empty(self::$ENVIRONMENTS_VARIABLES)) {
            self::$ENVIRONMENTS_VARIABLES = (array)getenv();
        }

        return self::$ENVIRONMENTS_VARIABLES;
    }
    private function accessEnviroments(): array
    {
        if (empty(self::$ENVIRONMENTS_VARIABLES_FROM_FILE)) {
            $dotenv = Dotenv::createImmutable(__DIR__ . '/../../', '.env');
            $dotenv->load();
            self::$ENVIRONMENTS_VARIABLES = $_ENV;
        }

        return self::$ENVIRONMENTS_VARIABLES_FROM_FILE;
    }

    public function getAllEnvironments(): array
    {
        if (empty(self::$ENVIRONMENTS_ALL)) {
            self::$ENVIRONMENTS_ALL = array_merge($this->createEnvironments(), $this->accessEnviroments());
        }

        return self::$ENVIRONMENTS_ALL;
    }

    public function getDefault(string $key, $defaultValue = null)
    {
        $environments = $this->getAllEnvironments();

        return $environments[$key] ?? $defaultValue;
    }
}
