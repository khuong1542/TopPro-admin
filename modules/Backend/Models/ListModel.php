<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class ListModel extends Model
{
    protected $table = 'list';
    public $incrementing = false;

    protected $sortable = [];
    protected $fillable = [];
}