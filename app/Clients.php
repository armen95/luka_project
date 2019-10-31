<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $table = 'clients';

	protected $fillable = [
        'name','legal_name','address','post_index','city','country', 'vat_number','contact_person','email', 'requirements'
    ];
}
