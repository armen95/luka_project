<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderFreelancers extends Model
{
    protected $table = 'order_freelancers';

	protected $fillable = [
        'order_id', 'freelancer_id', 'word_count'
    ];

    public $timestamps = false;
}
