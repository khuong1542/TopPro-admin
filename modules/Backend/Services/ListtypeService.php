<?php
 
namespace Modules\Backend\Services;

use Modules\Core\BaseService;
use Modules\Backend\Repositories\ListtypeRepository;

class ListtypeService extends BaseService
{
    private $validateService;
    public function __construct(
        ValidateService $validateService
    ){
        $this->validateService = $validateService;
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
        $data['order'] = $this->repository->select('id')->count() + 1;
        return $data;
    }
    /**
     * Sửa
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function edit($input): array
    {
        $data = [];
        return $data;
    }
    /**
     * Cập nhật
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function _update($input): array
    {
        $check = $this->validateService->validate($input, 'danh mục');
        if($check['status'] === false){
            foreach($check['message'] as $key => $message){
                return array('success' => false, 'message' => $message, 'key' => $key);
            }
        }
        $data = $this->repository->_update($input);
        return array('success' => true, 'message' => 'Cập nhật thành công');
    }
    
}