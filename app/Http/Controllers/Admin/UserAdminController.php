<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class UserAdminController extends Controller
{
    #[OA\Get(
        path: "/admin/users",
        summary: "Listado de usuarios",
        tags: ["Usuarios"],
        responses: [
            new OA\Response(
                response: 200,
                description: "Listado de usuarios"
            )
        ]
    )]
    public function index()
    {
        $users = User::paginate(10);

        return view(
            'admin.users.index',
            compact('users')
        );
    }

    #[OA\Get(
        path: "/admin/users/{id}/edit",
        summary: "Formulario de edición de usuario",
        tags: ["Usuarios"],
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: "Formulario de edición"
            )
        ]
    )]
    public function edit(User $user)
    {
        return view(
            'admin.users.edit',
            compact('user')
        );
    }

    #[OA\Put(
        path: "/admin/users/{id}",
        summary: "Actualizar rol de usuario",
        tags: ["Usuarios"],
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        responses: [
            new OA\Response(
                response: 302,
                description: "Usuario actualizado"
            )
        ]
    )]
    public function update(
        Request $request,
        User $user
    )
    {
        $request->validate([
            'role' =>
                'required|in:admin,vendor,editor,user'
        ]);

        $user->update([
            'role' => $request->role
        ]);

        return redirect()
            ->route('admin.users.index');
    }

    #[OA\Delete(
        path: "/admin/users/{id}",
        summary: "Eliminar usuario",
        tags: ["Usuarios"],
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        responses: [
            new OA\Response(
                response: 302,
                description: "Usuario eliminado"
            )
        ]
    )]
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('admin.users.index');
    }
}