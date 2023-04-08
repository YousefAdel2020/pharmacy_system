<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Http\Requests\Api\UpdateUserRequest;
use App\Http\Resources\AddressResource;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function update(UpdateUserRequest $request, Client $client)
    {
        $client->update($request->validated());

        return new ClientResource($client);
    }
}
