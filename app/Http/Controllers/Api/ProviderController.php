<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(\App\Models\Provider::latest()->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:500',
            'status' => 'boolean'
        ]);

        $provider = \App\Models\Provider::create($validated);
        return response()->json($provider, 201);
    }

    public function show(\App\Models\Provider $provider)
    {
        return response()->json($provider);
    }

    public function update(Request $request, \App\Models\Provider $provider)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:500',
            'status' => 'boolean'
        ]);

        $provider->update($validated);
        return response()->json($provider);
    }

    public function destroy(\App\Models\Provider $provider)
    {
        $provider->delete();
        return response()->json(null, 204);
    }
}
