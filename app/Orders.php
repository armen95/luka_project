<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';

	protected $fillable = [
        'name', 'client_id', 'freelancer_id', 'deadline', 'status', 'comments', 'word_count'
    ];
}
