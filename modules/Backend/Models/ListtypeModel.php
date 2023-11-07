<?php

namespace Modules\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class ListtypeModel extends Model
{
    protected $table = 'listtype';
    public $incrementing = false;

    protected $sortable = [];
    protected $fillable = [];

    public function filter($query, $param, $value)
    {
        switch($param){
            case 'id':
                return $query;
            default: return $query;
        }
    }
}