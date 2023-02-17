<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory, RecordsActivity;

    protected $guarded = [];

    /* Полиморфное отношение – получаем сообщение, за которое был отдан голос */
    public function favorited()
    {
        return $this->morphTo();
    }
}
