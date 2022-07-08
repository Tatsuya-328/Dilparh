<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnswerResource extends JsonResource
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
            'id'     => $this->id,
            'users_id'   => $this->users_id,
            'words_id' => $this->words_ud,  // *1
            'correct'   => $this->correct,
            'wrong'   => $this->wrong  // *2
        ];
    }
}
