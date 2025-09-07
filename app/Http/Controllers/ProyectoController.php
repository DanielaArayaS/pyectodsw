<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProyectoController extends Controller
{
    // Listar todos los proyectos
    public function index() {
        $proyectos = Proyecto::all();
        return response()->json($proyectos, 200);
    }

    // Obtener un proyecto por ID
    public function show($id) {
        $proyecto = Proyecto::find($id);
        if (!$proyecto) {
            return response()->json(['mensaje' => 'Proyecto no encontrado'], 404);
        }
        return response()->json($proyecto, 200);
    }

    // Crear un nuevo proyecto
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'estado' => 'required|string',
            'responsable' => 'required|string',
            'monto' => 'required|numeric',
            'created_by' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $proyecto = Proyecto::create($request->all());

        return response()->json([
            'mensaje' => 'Proyecto creado correctamente',
            'proyecto' => $proyecto
        ], 201);
    }

    // Actualizar un proyecto
    public function update(Request $request, $id) {
        $proyecto = Proyecto::find($id);
        if (!$proyecto) {
            return response()->json(['mensaje' => 'Proyecto no encontrado'], 404);
        }

        $proyecto->update($request->all());

        return response()->json([
            'mensaje' => 'Proyecto actualizado correctamente',
            'proyecto' => $proyecto
        ], 200);
    }

    // Eliminar un proyecto
    public function destroy($id) {
        $proyecto = Proyecto::find($id);
        if (!$proyecto) {
            return response()->json(['mensaje' => 'Proyecto no encontrado'], 404);
        }

        $proyecto->delete();

        return response()->json(null, 204);
    }
}
