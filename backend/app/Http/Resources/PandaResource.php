<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PandaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // $age = $this->birth === null ? null : (int)date('Y') - (int)date('Y',strtotime($this->birth));
        $age = $this->birth === null ? null : (int)date('Y') - (int)substr($this->birth, 0, 4);
        return [
            "id" => $this->id,
            "name" => $this->name,
            "sex" => $this->sex,
            "birth" => $this->birth,
            "age" => $age
        ];
    }
}
