<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index() {
        $proyectos = Proyecto::all();
        $valorUF = $this->obtenerValorUF();
        return view('proyectos.index', compact('proyectos', 'valorUF'));
    }


    public function create() {
        return view('proyectos.create');
    }

    public function store(Request $request) {
        Proyecto::create($request->all());
        return redirect('/proyectos');
    }

    public function show($id) {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.show', compact('proyecto'));
    }

    public function edit($id) {
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.edit', compact('proyecto'));
    }

    public function update(Request $request, $id) {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->update($request->all());
        return redirect('/proyectos');
    }

    public function destroy($id) {
        Proyecto::destroy($id);
        return redirect('/proyectos');
    }

}
