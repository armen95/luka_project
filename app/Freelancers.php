<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Freelancers extends Model
{
	protected $table = 'contractors';

	protected $fillable = [
        'name','email','contact','source_lang','target_lang','hourly_payment', 'word_payment','speciality','availability', 'tracking_system'
    ];

	public $timestamps = true;

}