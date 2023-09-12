<?php

namespace Pnmoura\Deliveryzefood\AllRegisters;

use Doctrine\DBAL\DriverManager;

class ConnectionDatabase
{
    public function listRegisters(): array
    {
        $conn = $this->createDatabaseConnection();
        $query = "SELECT 
                        fullname as 'nome', 
                        cpf, 
                        birthdate as 'Data de Nasc.', 
                        telephone as 'Telefone', 
                        address as 'Endereço'    
                    FROM 
                        users";
        $result = $conn->executeQuery($query)->fetchAllAssociative();

        return $result;
    }


    public function insertRegister($json): array
    {
        $data = json_encode($json, true);

        $conn = $this->createDatabaseConnection();
        $query = "INSERT INTO users (fullname, cpf, birthdate, telephone, address) 
              VALUES (:fullname, :cpf, :birthdate, :telephone, :address)";

        if ($data === null || !isset($data['nome'], $data['cpf'], $data['birthdate'], $data['telephone'], $data['address'])) {
            throw new \InvalidArgumentException('JSON inválido ou formato incorreto.');
        }

        $params = [
            'fullname' => $data['fullname'],
            'cpf' => $data['cpf'],
            'birthdate' => $data['birthdate'],
            'telephone' => $data['telephone'],
            'address' => $data['address']
        ];

        $conn->executeStatement($query, $params);
    }

    private function createDatabaseConnection()
    {
        $connectionParams = [
            'host' => 'localhost:3306',
            'user' => 'root',
            'password' => 'Cd4kzEeZuFBDdyo',
            'dbname' => 'delivery-ze-food',
            'driver' => 'pdo_mysql',
        ];

        return DriverManager::getConnection($connectionParams);
    }
}
