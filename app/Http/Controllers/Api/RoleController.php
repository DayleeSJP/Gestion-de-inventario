<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller {
    public function index() {
        $roles = Role::with('permissions')->get()->map(function($role) {
            return [
                'id' => $role->id,
                'name' => $role->name,
                'description' => $role->description ?? '',
                'color' => $role->color ?? 'bg-primary',
                'permissions' => $role->permissions->pluck('name'),
                'permissionsCount' => $role->permissions->count(),
            ];
        });
        return response()->json($roles);
    }
    public function store(Request $request) {
        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);
        
        $permissions = [];
        if ($request->has('permissions') && is_array($request->permissions)) {
            foreach ($request->permissions as $permName) {
                $permissions[] = \Spatie\Permission\Models\Permission::firstOrCreate(['name' => $permName, 'guard_name' => 'web']);
            }
            $role->syncPermissions($permissions);
        }

        return response()->json([
            'id' => $role->id,
            'name' => $role->name,
            'description' => $request->description ?? '',
            'color' => $request->color ?? 'bg-primary',
            'permissions' => $role->permissions->pluck('name'),
            'permissionsCount' => $role->permissions->count(),
        ], 201);
    }
    public function update(Request $request, $id) {
        $role = Role::findOrFail($id);
        $role->update(['name' => $request->name]);
        
        $permissions = [];
        if ($request->has('permissions') && is_array($request->permissions)) {
            foreach ($request->permissions as $permName) {
                $permissions[] = \Spatie\Permission\Models\Permission::firstOrCreate(['name' => $permName, 'guard_name' => 'web']);
            }
            $role->syncPermissions($permissions);
        }

        return response()->json([
            'id' => $role->id,
            'name' => $role->name,
            'description' => $request->description ?? '',
            'color' => $request->color ?? 'bg-primary',
            'permissions' => $role->permissions->pluck('name'),
            'permissionsCount' => $role->permissions->count(),
        ]);
    }
    public function destroy($id) {
        $role = Role::findOrFail($id);
        $role->delete();
        return response()->json(null, 204);
    }
}
