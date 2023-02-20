<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory, Favoritable, RecordsActivity;

    protected $guarded = [];
    /* Активная загрузка (eager loading)  */
    protected $with = ['owner', 'favorites'];

    protected $touches = ['thread'];
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($reply) {
            $reply->favorites->each->delete();
        });
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    public function path()
    {
        return $this->thread->path() . "#reply-{$this->id}";
    }

    public function wasJustPublished()
    {
        return $this->created_at->gt(Carbon::now()->subMinute());
    }
}
