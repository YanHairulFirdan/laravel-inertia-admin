<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $language = $request->locale ?? 'en';
        /** @var \App\Models\Post $post */
        $post = $this->resource;

        App::setLocale($language);

        return [
            'id' => $post->id,
            'title' => $post->title ?? '',
            'content' => $post->content ?? '',
            'selected_language' => $language,
            'languages' => $this->whenLoaded('languages'),
        ];
    }
}
