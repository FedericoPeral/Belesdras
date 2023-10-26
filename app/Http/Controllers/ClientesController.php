<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     * retorna la vista index 
     */
    public function index()
    {   
       $clientes=Clientes::all(); 
        return view('clientes.indexclientes' , compact ('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     * retorna la vista del formulario de creacion
     */
    public function create()
    {
        $clientes=Clientes::all(); 
        return view('clientes.indexclientes');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name=$request->input('nombre');
        $apellido=$request->input('apellido');
        $dni=$request->input('dni');
        $telefono=$request->input('telefonos');

        $clientes=new Clientes();

        $clientes->name = $name;
        $clientes->apellido = $apellido;
        $clientes->dni = $dni;
        $clientes->telefono = $telefono;
        
        $clientes->save();
    
        return redirect()->route('indexclientes')->with('success', 'Cliente creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $clientes = Clientes::find($id);
        if ($clientes) {
            return view('clientes.edit_clientes', compact('clientes'));
        } else {
            // Maneja el caso en el que el profesional no se encuentra
            return redirect()->route('indexclientes')->with('error', 'Cliente no encontrado');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $clientes = Clientes::find($id);

        if (!$clientes) {
            // Maneja el caso en el que el profesional no se encuentra
            return redirect()->route('indexclientes.index')->with('error', 'Cliente no encontrado');
        }
        


        $clientes->name = $request->input('nombre');
        $clientes->apellido = $request->input('apellido');
        $clientes->dni = $request->input('dni');
        $clientes->telefono = $request->input('telefono');

        $clientes->save();
        // Redirige de vuelta a la vista de listado de profesionales
        return redirect()->route('indexclientes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $clientes = Clientes::find($id);
        $clientes->delete();

        return redirect()->route('indexclientes');
    }
}
