<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'code' => $this->product->code,
            'title' => $this->product->title,
            'country' => $this->product->information->country,
            'price' => $this->product->price,
            'count1' => $this->type_id == 1 ? $this->amount : '----',
            'created_at1' => $this->type_id == 1 ? $this->created_at : '----',
            'partner' => $this->type_id == 1 ? $this->partner->title : '----',
            'count2' => $this->type_id == 2 ? $this->amount : '----',
            'created_at2' => $this->type_id == 2 ? $this->created_at : '----',
            'worker' => $this->type_id == 2 ? $this->worker->name . ' ' . $this->worker->surname : '----',
            'remainder' => $this->remainder,
        ];
    }
}
