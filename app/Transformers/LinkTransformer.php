<?php

namespace App\Transformers;

use App\Models\Link;
use Flugg\Responder\Transformers\Transformer;

class LinkTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [];

    /**
     * List of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param  Link  $link
     * @return array
     */
    public function transform(Link $link)
    {
        return [
            'id' => (int) $link->id,
            'code' => (string) $link->code,
            'link' => (string) $link->getLink(),
            'url' => (string) $link->url,
            'title' => (string) $link->title,
            'description' => (string) $link->description,
            'archived' => (bool) $link->archived,
            'disabled' => (bool) $link->disabled,
            'visits' => $link->visits->count(),
            'user' => $link->user_id ? (new UserTransformer())->transform($link->user) : null,
            'created_at' => $link->created_at->toISOString(),
            'updated_at' => $link->updated_at->toISOString(),
        ];
    }
}
