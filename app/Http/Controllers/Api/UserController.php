<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function index() { 
        $users = User::with('role')->get()->map(function($u) {
            $data = $u->toArray();
            $data['role'] = $u->role ? $u->role->name : 'Sin rol';
            return $data;
        });
        return response()->json($users); 
    }
    public function store(Request $request) {
        $data = $request->all();
        if (isset($data['role'])) {
            $role = Role::firstOrCreate(['name' => $data['role']]);
            $data['role_id'] = $role->id;
            unset($data['role']);
        }
        $user = User::create($data);
        return response()->json($user, 201);
    }
    public function update(Request $request, User $user) {
        $data = $request->except('image');
        if (isset($data['role'])) {
            $role = Role::firstOrCreate(['name' => $data['role']]);
            $data['role_id'] = $role->id;
            unset($data['role']);
        }
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('avatars', 'public');
            $data['image'] = '/storage/' . $path;
        }

        $user->update($data);
        return response()->json($user);
    }
    public function destroy(User $user) {
        $user->delete();
        return response()->json(null, 204);
    }
}
