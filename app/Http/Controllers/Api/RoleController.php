<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller {
    public function index() { 
        return response()->json(Role::all()); 
    }
    public function store(Request $request) {
        $role = Role::create($request->all());
        return response()->json($role, 201);
    }
    public function update(Request $request, Role $role) {
        $role->update($request->all());
        return response()->json($role);
    }
    public function destroy(Role $role) {
        $role->delete();
        return response()->json(null, 204);
    }
}
