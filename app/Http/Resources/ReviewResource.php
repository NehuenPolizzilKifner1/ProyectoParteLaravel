<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'stars'       => $this->stars,
            'comment'     => $this->comment,
            'review_date' => $this->review_date,
            'usuario'     => $this->whenLoaded(
                'user',
                fn () => $this->user->name,
                'Anónimo'
            ),
        ];
    }
}
