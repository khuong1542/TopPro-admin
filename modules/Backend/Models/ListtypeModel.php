<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class ListtypeModel extends Model
{
    protected $table = 'listtype';
    public $incrementing = false;

    protected $sortable = [];
    protected $fillable = [];
}