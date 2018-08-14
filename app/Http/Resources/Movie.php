<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Movie extends JsonResource
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
            'movieID' => $this->movieID,
            'name' => $this->title,
            'release_year' => $this->release_year,
            'genre' => $this->genre,
            'rating' => $this->rating
        ];
        //return $request;
    }
}
