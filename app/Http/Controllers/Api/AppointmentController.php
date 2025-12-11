<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
    

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Appointment::all();
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    try{
    $data = $request->validate([
        'patient_name' => 'required|string|max:255',
        'doctor_name' => 'required|string|max:255',
        'date' => 'required|date',
        'time' => 'required|date_format:H:i:s',
        'reason' => 'required|string|max:255',
        'status' => 'sometimes|in:pendiente,realizada,cancelada',
        'description' => 'nullable|string|max:500',
    ]);

  return Appointment::create($data);
    
}
catch(\Exception $e){
    return response()->json(
        ['message' => 'Error al crear la cita porfavor rellene todos los campos']
        
    );
    }

}
    /**
     * Display the specified resource.
     */
    public function show(Appointment $cita)
    {
        return $cita;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $cita)
    {
        $data = $request->validate([
            'patient_name' => 'sometimes|string|max:255',
            'doctor_name' => 'sometimes|string|max:255',
            'date' => 'sometimes|date',
            'time' => 'sometimes|date_format:H:i:s',
            'reason' => 'sometimes|string|max:255',
            'status' => 'sometimes|in:pendiente,realizada,cancelada',
            'description' => 'nullable|string|max:500', 
        ]);
        $cita->update($data);
        return $cita;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $cita)
    {
        $cita->delete();
        return response()->json(
            ['message' => 'Cita eliminada correctamente']
        );
    }
}
