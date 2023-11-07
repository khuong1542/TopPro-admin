<?php
 
namespace Modules\Backend\Services;

use Modules\Core\BaseService;
use Modules\Backend\Repositories\ListtypeRepository;

class ListtypeService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }
    public function repository()
    {
        return ListtypeRepository::class;
    }
    /**
     * Trang Index
     */
    public function index(): array
    {
        $data = [];
        return $data;
    }
    /**
     * Danh sách
     * @param $input Dữ liệu đầu vào
     * @return array
     */
    public function loadList($input): array
    {
        $data['datas'] = $this->repository->filter($input);
        return array(
            'arrData' => view('listtype.listtype.loadList', $data)->render(),
            'perPage' => $input['limit'],
        );;
    }
    /**
     * Thêm mới
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function create($input): array
    {
        $data = [];
        return $data;
    }
}