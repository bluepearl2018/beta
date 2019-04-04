<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * A Contact model is the best way to add prospect to our DB
 */
class Contact extends Model
{
    protected $table = 'contact';

    protected $fillable = ['title'];
}
