<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;    
use App\Models\Turno;    
use App\Models\Profesional;   

class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $turnos = Turno::with('cliente')->get();
        $cliente = Clientes::all();
        $profesional = Profesional::all();

           // Carga la lista de profesionales en el select
           $listaClientes = [];
           foreach ($cliente as $client) {
               // Comprueba si el profesional es null
               if ($client) {
                   $listaClientes[] = [
                       'id' => $client->id,
                       'name' => $client->name,
                       'apellido' => $client->apellido,
                   ];
               }
           }

           // Carga la lista de profesionales en el select
            $listaProfesionales = [];
            foreach ($profesional as $profesionale) {
                // Comprueba si el profesional es null
                if ($profesionale) {
                    $listaProfesionales[] = [
                        'id' => $profesionale->id,
                        'name' => $profesionale->name,
                        'apellido' => $profesionale->apellido,
                    ];
                }
            }



        return view('turnos.indexturnos',compact('turnos','client','profesionale','listaClientes','listaProfesionales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $turnos = Turno::all();
        $clientes = Cliente::all();
        $profesionales = Profesional::all();
        return view('turnos.indexturnos',compact('turnos','clientes','profesionales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $turno = new Turno();
        $turno->id_clientes = $request->input('id_clientes');
        $turno->id_profesionales = $request->input('id_profesionales');
        $turno->fecha = $request->input('fecha');
        $turno->hora = $request->input('hora');
        $turno->estado_pago = boolval($request->input('estado_pago'));
        $turno->estado_turno = boolval($request->input('estado_turno'));
        $turno->save();

        // Redirige a la vista de confirmación de turno
        return redirect()->route('indexturnos', $turno->id)->with('success', 'Turno creado exitosamente.');

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $turnos = Turno::find($id);
        $turnos->delete();

        return redirect()->route('indexturnos');

    }
}
