<?php

declare(strict_types=1);

namespace Kernel\Data\Cryptography;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\SignatureInvalidException;
use Kernel\Configuration\Configuration;
use Kernel\DependencyInjection\ServiceContainer;

abstract class JsonWebToken
{
    public function encode(array $payload) : string
    {
        return JWT::encode($payload, self::getSecret(), 'HS256');
    }

    public static function decode(string $jwt) : array
    {
        try {
            $payload = (array) JWT::decode($jwt, new Key(self::getSecret(), 'HS256'));
        } catch (SignatureInvalidException | \UnexpectedValueException $exception) {
            $payload = [];
        }

        return $payload;
    }

    public static function encodeId(string $id) : string
    {
        return self::encode(['id' => $id]);
    }

    public static function decodeId(string $token): ?int
    {
        $id = self::decode($token);
        return isset($id['id']) ? (int)$id['id'] : null;
    }

    public static function getConfiguration() : Configuration
    {
        return ServiceContainer::get()->get('kernel.configuration');
    }
}