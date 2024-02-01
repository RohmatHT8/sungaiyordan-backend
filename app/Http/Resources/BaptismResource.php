<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BaptismResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'branch' => new BranchSelect($this->whenLoaded('branch')),
            'no' => $this->no,
            'place_of_baptism_outside' => $this->place_of_baptism_outside,
            'date' => $this->date,
            'who_baptism' => $this->who_baptism,
            'user' => new UserSertificateSelect($this->whenLoaded('user')),
            'can_delete' => $this->can_delete,
            'can_update' => $this->can_update,
            'can_print' => $this->can_print,
        ];
    }
}
