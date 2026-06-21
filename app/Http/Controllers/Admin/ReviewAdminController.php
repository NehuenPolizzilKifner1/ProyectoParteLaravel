<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class ReviewAdminController extends Controller
{
    #[OA\Get(
        path: "/admin/reviews",
        summary: "Listado de comentarios",
        tags: ["Comentarios"],
        responses: [
            new OA\Response(
                response: 200,
                description: "Listado de comentarios"
            )
        ]
    )]
    public function index()
    {
        $reviews = Review::with([
            'user',
            'product'
        ])->paginate(10);

        return view(
            'admin.reviews.index',
            compact('reviews')
        );
    }

    #[OA\Get(
        path: "/admin/reviews/{id}/edit",
        summary: "Formulario de edición de comentario",
        tags: ["Comentarios"],
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
    public function edit(Review $review)
    {
        return view(
            'admin.reviews.edit',
            compact('review')
        );
    }

    #[OA\Put(
        path: "/admin/reviews/{id}",
        summary: "Actualizar comentario",
        tags: ["Comentarios"],
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
                description: "Comentario actualizado"
            )
        ]
    )]
    public function update(
        Request $request,
        Review $review
    )
    {
        $request->validate([
            'stars' => 'required|integer|min:1|max:5',
            'comment' => 'required'
        ]);

        $review->update([
            'stars' => $request->stars,
            'comment' => $request->comment
        ]);

        return redirect()
            ->route('admin.reviews.index');
    }

    #[OA\Delete(
        path: "/admin/reviews/{id}",
        summary: "Eliminar comentario",
        tags: ["Comentarios"],
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
                description: "Comentario eliminado"
            )
        ]
    )]
    public function destroy(
        Review $review
    )
    {
        $review->delete();

        return redirect()
            ->route('admin.reviews.index');
    }
}