<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriesModel extends Model
{
    protected $table = 'categories';
    public $incrementing = false;

    protected $fillable = [];
}