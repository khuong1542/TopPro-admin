<?php

namespace Modules\Backend\Repositories;

use Modules\Core\BaseRepository;
use Modules\Backend\Models\ListtypeModel;

class ListtypeRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct();
    }
    public function model()
    {
        return ListtypeModel::class;
    }
    public function _update($data)
    {
        if(isset($data['id']) && !empty($data['id'])){
            $sql = $this->model->where('id', $data['id'])->first();
            $sql->updated_at = date('Y-m-d H:i:s');
        }else{
            $sql = new $this->model;
            $sql->id = (string)\Str::uuid();
            $sql->created_at = date('Y-m-d H:i:s');
        }
        $sql->code = $data['code'] ?? null;
        $sql->name = $data['name'] ?? null;
        $sql->order = $data['order'] ?? null;
        $sql->status = isset($data['status']) && $data['status'] === 'on' ? 1 : 0;
        $sql->save();
        return $sql;
    }
}