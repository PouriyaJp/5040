<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        // بازگشت همه مراجعین همراه با نوبت‌هایشان
        return ClientResource::collection(Client::with('appointments')->get());
    }

    public function store(ClientRequest $request)
    {
        $inputs = $request->all();

        $client = Client::create($inputs);

        return response()->json($client, 201);
    }

    public function show(Client $client)
    {
        // بازگشت یک مراجع خاص همراه با نوبت‌هایش
        return new ClientResource($client->load('appointments'));
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $inputs = $request->all();

        $client->update($inputs);

        return response()->json($client, 200);
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return response()->json(null, 204);
    }
}
