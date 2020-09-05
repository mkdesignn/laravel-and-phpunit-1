<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\MissingValue;

class PostResource extends JsonResource
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
            'title'=>$this->title,
            'content'=>$this->content,
            'type'=>$this->type,
            'status'=>$this->status,
            'slug'=>$this->slug,
            'visible'=>$this->visible,
            'thumbnail'=>$this->thumbnail,
            'publish_time'=>$this->publish_time,
            'keywords'=>$this->keywords,
            'created_at' => $this->created_at->toDateTimeString()
        ];
    }
}
