<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    // Registro de usuario
    public function register(Request $request)
    {
        // Validar datos recibidos
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:usuarios,correo',
            'clave' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Crear usuario con contraseña cifrada
        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'clave' => Hash::make($request->clave),
        ]);

        return response()->json([
            'mensaje' => 'Usuario registrado correctamente',
            'usuario' => $usuario
        ], 201);
    }

    // Inicio de sesión
    public function login(Request $request)
    {
        $credentials = $request->only('correo', 'clave');

        // Buscar usuario por correo
        $usuario = Usuario::where('correo', $credentials['correo'])->first();

        // Validar existencia y contraseña
        if (!$usuario || !Hash::check($credentials['clave'], $usuario->clave)) {
            return response()->json(['error' => 'Credenciales incorrectas'], 401);
        }

        // Generar token JWT
        $token = JWTAuth::fromUser($usuario);

        return response()->json([
            'mensaje' => 'Inicio de sesión exitoso',
            'token' => $token
        ]);
    }
}
