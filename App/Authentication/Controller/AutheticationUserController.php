<?php /** @noinspection ALL */

declare(strict_types=1);

namespace App\Authentication\Controller;

use App\Authentication\Application\Input\AuthenticationUser;
use App\Authentication\Service\AuthenticationService;
use App\Users\Service\UserService;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Response;

class AutheticationUserController extends UserService
{
    public function loginUser(Request $request, Response $response): Response
    {
        $body = json_decode($request->getBody()->getContents(), true);

        if (isset($body['email'], $body['senha'])) {
            $email = $body['email'];
            $senha = $body['senha'];

            $list = new AuthenticationService();
            $access = $list->list();

            $emailEncontrado = false;
            $senhaEncontrada = false;

            $hash = md5($senha);

            foreach ($access as $item) {
                if ($item['email'] === $email) {
                    $emailEncontrado = true;
                }
                if ($item['senha'] === $hash) {
                    $senhaEncontrada = true;
                }
            }

            if ($emailEncontrado && $senhaEncontrada) {
                // Ambos email e senha estão corretos
                echo "Login bem-sucedido.\n";
            } elseif (!$emailEncontrado) {
                echo "O email não foi encontrado.\n";
                die();
            } elseif (!$senhaEncontrada) {
                echo "A senha está incorreta.\n";
            }
        }

    }
}
