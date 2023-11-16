<?php

namespace Modules\Backend\Services;

use Modules\Backend\Repositories\BlogsRepository;
use Modules\Core\BaseService;

class BlogsService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }
    public function repository()
    {
        return BlogsRepository::class;
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
        $input['sort'] = 'order';
        $data['datas'] = $this->repository->filter($input);
        return array(
            'arrData' => view('blogs.loadList', $data)->render(),
            'perPage' => $input['limit'],
        );;
    }
}