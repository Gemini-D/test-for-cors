<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Middleware;

use Hyperf\Utils\Context;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class CorsMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        Context::set(ResponseInterface::class, $response = $this->handleCORS(Context::get(ResponseInterface::class)));

        if ($request->getMethod() == 'OPTIONS') {
            return $response;
        }

        return $handler->handle($request);
        // if ($request->getMethod() == 'OPTIONS') {
        //     return $this->handleCORS(Context::get(ResponseInterface::class));
        // }
        //
        // return $this->handleCORS($handler->handle($request));
    }

    protected function handleCORS(ResponseInterface $response): ResponseInterface
    {
        $response = $response->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Credentials', 'true')
            // Headers 可以根据实际情况进行改写。
            ->withHeader('Access-Control-Allow-Headers', 'DNT,Keep-Alive,User-Agent,Cache-Control,Content-Type,Authorization');

        Context::set(ResponseInterface::class, $response);
        return $response;
    }
}
