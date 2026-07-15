<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller {
    public function index() {
        $users = User::with('roles')->get()->map(function($u) {
            $data = $u->toArray();
            $data['role'] = $u->roles->first() ? $u->roles->first()->name : 'Sin rol';
            $data['status'] = $u->status ? 'activo' : 'inactivo';
            $data['image'] = $u->image ?? $u->avatar ?? null;
            return $data;
        });
        return response()->json($users);
    }
    public function store(Request $request) {
        $data = $request->except(['role', 'image', 'avatarColor']);
        $data['status'] = ($request->status === 'activo' || $request->active === true);
        if ($request->avatarColor) {
            $data['avatar'] = $request->avatarColor; // reuse avatar field for color
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $avatarsPath = public_path('avatars');
            if (!file_exists($avatarsPath)) {
                mkdir($avatarsPath, 0755, true);
            }
            $imageName = time() . '_' . preg_replace('/[^A-Za-z0-9_.-]/', '_', $file->getClientOriginalName());
            $file->move($avatarsPath, $imageName);
            $data['image'] = '/avatars/' . $imageName;
        } elseif ($request->has('image') && is_string($request->image)) {
            if (preg_match('/^data:image\/([\w]+);base64,/', $request->image, $type)) {
                $image = substr($request->image, strpos($request->image, ',') + 1);
                $type = strtolower($type[1]);
                $image = str_replace(' ', '+', $image);
                $imageName = \Illuminate\Support\Str::random(10).'.'.$type;
                $avatarsPath = public_path('avatars');
                if (!file_exists($avatarsPath)) {
                    mkdir($avatarsPath, 0755, true);
                }
                file_put_contents($avatarsPath . '/' . $imageName, base64_decode($image));
                $data['image'] = '/avatars/' . $imageName;
            } else {
                $data['image'] = $request->image;
            }
        }

        $user = User::create($data);

        // Assign role via Spatie
        if ($request->role) {
            $role = Role::firstOrCreate(['name' => $request->role]);
            $user->assignRole($role);
        }

        return response()->json($user, 201);
    }
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $data = $request->except(['role', 'image', 'avatarColor', '_method']);

        if ($request->has('status')) {
            $data['status'] = ($request->status === 'activo' || $request->status === true || $request->active === true);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $avatarsPath = public_path('avatars');
            if (!file_exists($avatarsPath)) {
                mkdir($avatarsPath, 0755, true);
            }
            $imageName = time() . '_' . preg_replace('/[^A-Za-z0-9_.-]/', '_', $file->getClientOriginalName());
            $file->move($avatarsPath, $imageName);
            $data['image'] = '/avatars/' . $imageName;
        } elseif ($request->has('image') && is_string($request->image)) {
            if (preg_match('/^data:image\/(\w+);base64,/', $request->image, $type)) {
                $image = substr($request->image, strpos($request->image, ',') + 1);
                $type = strtolower($type[1]);
                $image = str_replace(' ', '+', $image);
                $imageName = \Illuminate\Support\Str::random(10).'.'.$type;
                $avatarsPath = public_path('avatars');
                if (!file_exists($avatarsPath)) {
                    mkdir($avatarsPath, 0755, true);
                }
                file_put_contents($avatarsPath . '/' . $imageName, base64_decode($image));
                $data['image'] = '/avatars/' . $imageName;
            } else {
                $data['image'] = $request->image;
            }
        }

        $user->update($data);

        // Update role
        if ($request->role) {
            $role = Role::firstOrCreate(['name' => $request->role]);
            $user->syncRoles([$role]);
        }

        // Reload with roles
        $user->load('roles');
        $result = $user->toArray();
        $result['role'] = $user->roles->first() ? $user->roles->first()->name : 'Sin rol';
        $result['status'] = $user->status ? 'activo' : 'inactivo';
        $result['image'] = $user->image ?? $user->avatar ?? null;

        return response()->json($result);
    }
    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(null, 204);
    }
}
