<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultantRequest;
use App\Http\Requests\UpdateConsultantRequest;
use App\Http\Resources\ConsultantResource;
use App\Models\Consultant;
use Illuminate\Http\Request;

class ConsultantController extends Controller
{
    public function index()
    {
        // بازگشت همه مشاوران همراه با نوبت‌هایشان
        return ConsultantResource::collection(Consultant::with('appointments')->get());
    }

    public function store(ConsultantRequest $request)
    {
        $inputs = $request->all();

        $consultant = Consultant::create($inputs);

        return response()->json($consultant, 201);
    }

    public function show(Consultant $consultant)
    {
        // بازگشت یک مشاور خاص همراه با نوبت‌هایش
        return new ConsultantResource($consultant->load('appointments'));
    }

    public function update(UpdateConsultantRequest $request, Consultant $consultant)
    {
        $inputs = $request->all();

        $consultant->update($inputs);

        return response()->json($consultant, 200);
    }

    public function destroy(Consultant $consultant)
    {
        $consultant->delete();

        return response()->json(null, 204);
    }
}
