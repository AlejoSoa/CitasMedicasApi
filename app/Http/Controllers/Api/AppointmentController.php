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
        $data = $request->validate([
            'patient_name' => 'required|string|max:255',
            'doctor_name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'reason' => 'required|string|max:255',
            'status' => 'sometimes|required|in:pendiente, realizada, cancelada',
        ]);
        return Appointment::create($data);
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
            'patient_name' => 'required|string|max:255',
            'doctor_name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'reason' => 'required|string|max:255',
            'status' => 'sometimes|required|in:pendiente, realizada, cancelada'
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
