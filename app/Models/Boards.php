<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boards extends Model
{
    // Table
    protected $table = 'boards';

    // Columns
    protected $fillable = ['creator_id','name'];
    protected $primary_key = 'id';

    // Auto increment
    public $incrementing = true;

    public $timestamps = true;
}
