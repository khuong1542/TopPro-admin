<?php

namespace Modules\Api\Repositories;

use Modules\Api\Models\UsersModel;
use Modules\Core\BaseRepository;

class UserRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct();
    }
    public function model()
    {
        return UsersModel::class;
    }
    /**
     * Lưu thông tin
     * @param $data Dữ liệu truyền vào
     * @return array $sql
     */
    public function _update($data)
    {
        // if(isset($data['order']) && !empty($data['order'])){
        //     $this->updateOrder($data);
        // }
        if(isset($data['id']) && !empty($data['id'])){
            $sql             = $this->model->where('id', $data['id'])->first();
            $sql->updated_at = date('Y-m-d H:i:s');
        }else{
            $sql             = new $this->model;
            $sql->id         = (string)\Str::uuid();
            $sql->created_at = date('Y-m-d H:i:s');
        }
        $sql->name = $data['name'] ?? null;
        $sql->email = $data['email'] ?? null;
        $sql->password = $data['password'] ?? null;
        // $sql->order               = $data['order'] ?? null;
        // $sql->status              = isset($data['status']) && $data['status'] === 'on' ? 1 : 0;
        $sql->save();
        return $sql;
    }
}