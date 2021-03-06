<?php

namespace Donatix\Blogify\Models;

use Donatix\Blogify\Models\Post;

class Status extends BaseModel
{
    const DRAFT = 'Draft';
    const PENDING = 'Pending review';
    const REVIEWED = 'Reviewed';

    public $timestamps = false;

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public static function getDraftId()
    {
        return (new static)->getCachedId(static::DRAFT);
    }

    public static function getPendingId()
    {
        return (new static)->getCachedId(static::PENDING);
    }

    public static function getReviewedId()
    {
        return (new static)->getCachedId(static::REVIEWED);
    }
}
