<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Mail\AppointmentNotification;
use App\Models\Appointment;
use App\Models\Client;
use App\Models\Consultant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    public function index()
    {
        // بازگشت همه نوبت‌ها همراه با مشاوران و مراجعین مربوطه
        return AppointmentResource::collection(Appointment::with(['consultant', 'client'])->get());
    }

    public function store(AppointmentRequest $request)
    {
        // Start a transaction
        DB::beginTransaction();

        try {
            $inputs = $request->all();

            // Create appointment
            $appointment = Appointment::create($inputs);

            // Fetch consultant and client
            $consultant = Consultant::find($request->consultant_id);
            $client = Client::find($request->client_id);

            // Send email notifications
            Mail::to($consultant->email)->send(new AppointmentNotification($appointment));
            Mail::to($client->email)->send(new AppointmentNotification($appointment));

            // Commit the transaction
            DB::commit();

            return response()->json($appointment, 201);

        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();

            // Optionally, handle the error, for example:
            return response()->json(['error' => 'Could not create appointment'], 500);
        }
    }

    public function show(Appointment $appointment)
    {
        // بازگشت یک نوبت خاص همراه با مشاور و مراجع مربوطه
        return new AppointmentResource($appointment->load(['consultant', 'client']));
    }

    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $inputs = $request->all();

        $appointment->update($inputs);

        return response()->json($appointment, 200);
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return response()->json(null, 204);
    }
}
