<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Cookie;
class VerifyAndRefreshToken
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */


     public function handle(Request $request, Closure $next): Response
     {
         try {
             $token = JWTAuth::getToken(); // Extrae el token de la solicitud

             if (!$token) {
                 return response()->json(['message' => 'Token no proporcionado'], 401);
             }

             $user = JWTAuth::setToken($token)->authenticate();

             // Obtén el tiempo restante antes de la expiración del token
             $expiration = JWTAuth::factory()->getTTL() * 60;

             if ($expiration < config('jwt.refresh_threshold')) {
                 // Si el token está a punto de caducar, refresca el token
                 $refreshedToken = JWTAuth::refresh();

                 // Actualiza la cabecera 'Authorization' con el nuevo token
                 $request->headers->set('Authorization', 'Bearer ' . $refreshedToken);

                 // Agregar log para imprimir el token generado
                 Log::info('Token refrescado y generado: ' . $refreshedToken);
             }

             return $next($request);
         } catch (JWTException $e) {
             return response()->json(['message' => 'Token inválido'], 401);
         }
     }



























    // public function handle(Request $request, Closure $next): Response
    // {
    //     try {
    //         $token = JWTAuth::getToken(); // Extrae el token de la solicitud

    //         if (!$token) {
    //             return response()->json(['message' => 'Token no proporcionado'], 401);
    //         }

    //         $user = JWTAuth::setToken($token)->authenticate();

    //         // Obtén el tiempo restante antes de la expiración del token
    //         $expiration = JWTAuth::factory()->getTTL() * 60;

    //         if ($expiration < config('jwt.refresh_threshold')) {
    //             // Si el token está a punto de caducar, refresca el token
    //             $token = JWTAuth::refresh();

    //             // Actualiza el token en la respuesta
    //             $response = $next($request);
    //             $response->headers->set('Authorization', 'Bearer ' . $token);

    //             return $response;
    //         }

    //         // Si no es necesario refrescar el token, continúa con la solicitud
    //         return $next($request);
    //     } catch (JWTException $e) {
    //         return response()->json(['message' => 'Token inválido'], 401);
    //     }
    // }
}
