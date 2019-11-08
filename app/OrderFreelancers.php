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

    public function freelancers()
    {
    	return $this->belongsTo('App\Freelancers', 'freelancer_id');
	}

	public function orders()
    {
        return $this->belongsTo('App\Orders', 'order_id');
	}
}
