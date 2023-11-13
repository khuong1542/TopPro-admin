<?php
 
namespace Modules\Backend\Services;

use Illuminate\Support\Facades\Validator;
use Modules\Core\BaseService;
use Modules\Backend\Repositories\CategoriesRepository;
use Modules\Core\Helpers\ListtypeHelper;
use Modules\Core\Helpers\LoggerHelpers;

class CategoriesService extends BaseService
{
    private $listtypeService;
    private $listService;
    private $validateService;
    private $logger;
    public function __construct(
        ListtypeService $listtypeService,
        ListService $listService,
        ValidateService $validateService)
    {
        $this->listtypeService = $listtypeService;
        $this->listService = $listService;
        $this->validateService = $validateService;
        $this->logger = new LoggerHelpers;
        $this->logger->setFileName('CategoriesService');
        parent::__construct();
    }
    public function repository()
    {
        return CategoriesRepository::class;
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
            'arrData' => view('categories.loadList', $data)->render(),
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
        $data['layout'] = ListtypeHelper::_getAllByCode(['DM_LAYOUT']);
        $data['type'] = ListtypeHelper::_getAllByCode(['DM_CATEGORY_TYPE']);
        $data['order'] = $this->repository->select('id')->count() + 1;
        return $data;
    }
    /**
     * Thêm mới danh sách đối tượng
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function addList($input): array
    {
        $validator = Validator::make($input, [
            'code' => 'required',
        ],[
            'code.required' => 'Không tồn tại mã danh mục!',
        ]);
        if($validator->fails()){
            return array('success' => false, 'message' => $validator->errors()->get('code')[0]);
        }
        $data['listtype'] = $this->listtypeService->where('code', $input['code'])->first();
        $data['order'] = $this->listService->where('listtype_id', ($data['listtype']->id ?? null))->count() + 1;
        return $data;
    }
    /**
     * Cập nhật danh mục đối tượng
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function updateList($input): array
    {
        $validator = Validator::make($input, [
            'dataUpdate' => 'required',
        ],[
            'dataUpdate.required' => 'Không tồn tại dữ liệu cập nhật!',
        ]);
        if($validator->fails()){
            return array('success' => false, 'message' => $validator->errors()->get('dataUpdate')[0]);
        }
        parse_str($input['dataUpdate'], $params);
        $data = $this->listService->_update($params);
        return $data;
    }
    /**
     * Thêm mới danh sách
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function addListtype($input): array
    {
        $data['order'] = $this->listtypeService->select('id')->count();
        return $data;
    }
    /**
     * Cập nhật danh mục
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function updateListtype($input): array
    {
        $validator = Validator::make($input, [
            'dataUpdate' => 'required',
        ],[
            'dataUpdate.required' => 'Không tồn tại dữ liệu cập nhật!',
        ]);
        if($validator->fails()){
            return array('success' => false, 'message' => $validator->errors()->get('dataUpdate')[0]);
        }
        parse_str($input['dataUpdate'], $params);
        $data = $this->listtypeService->_update($params);
        $data['order'] = $this->listService->where('listtype_id', $data['data']->id)->count() + 1;
        return $data;
    }
    /**
     * Sửa
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function edit($input): array
    {
        $categories = $this->repository->where('id', $input['id'])->first();
        $data['checked'] = $categories->status == 1 ? 'checked="checked"' : '';
        $data['datas'] = $categories;
        return $data;
    }
    /**
     * Cập nhật
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function _update($input): array
    {
        dd($input);
        // $check = $this->validateService->validate($input, 'danh mục');
        // if ($check['status'] === false) {
        //     foreach ($check['message'] as $key => $message) {
        //         return array('success' => false, 'message' => $message, 'key' => $key);
        //     }
        // }
        try {
            $this->logger->setChannel('Update')->log('Params', $input);
            $data = $this->repository->_update($input);
            return array('success' => true, 'message' => 'Cập nhật thành công');
        } catch (\Exception $e) {
            $this->logger->setChannel('Update')->log('Messages', ['Line:' => $e->getLine(), 'Message:' => $e->getMessage(), 'FileName:' => $e->getFile()]);
            return array('success' => false, 'message' => $e->getMessage());
        }
    }
    /**
     * Xóa
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function _delete($input): array
    {
        $arrIds = explode(',', $input['listId']);
        try {
            $this->logger->setChannel('Delete')->log('Params', $arrIds);
            $this->repository->whereIn('id', $arrIds)->delete();
            return array('success' => true, 'message' => 'Xóa thành công.');
        } catch (\Exception $e) {
            $this->logger->setChannel('Delete')->log('Messages', ['Line:' => $e->getLine(), 'Message:' => $e->getMessage(), 'FileName:' => $e->getFile()]);
            return array('success' => false, 'message' => 'Xóa thất bại!');
        }
    }
    /**
     * Cập nhật số thứ tự
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function updateOrderTable($input): array
    {
        try {
            $this->logger->setChannel('UpdateOrderTable')->log('Params', $input);
            $categories = $this->repository->select('*')->orderBy('updated_at')->orderBy('created_at')->get();
            $i = 1;
            foreach ($categories as $key => $value) {
                $value->update(['order' => $i++]);
            }
            return array('success' => true, 'message' => 'Cập nhật thành công!');
        } catch (\Exception $e) {
            $this->logger->setChannel('UpdateOrderTable')->log('Message', ['Line:' => $e->getLine(), 'Message:' => $e->getMessage(), 'FileName:' => $e->getFile()]);
            return array('success' => false, 'message' => 'Xóa thất bại!');
        }
    }
    /**
     * Cập nhật trạng thái
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function changeStatus($input): array
    {
        try {
            $this->logger->setChannel('ChangeStatus')->log('Params', $input);
            $this->repository->where('id', $input['id'])->update(['status' => $input['status']]);
            return array('success' => true, 'message' => 'Cập nhật thành công!');
        } catch (\Exception $e) {
            $this->logger->setChannel('ChangeStatus')->log('Message', ['Line:' => $e->getLine(), 'Message:' => $e->getMessage(), 'FileName:' => $e->getFile()]);
            return array('success' => false, 'message' => 'Xóa thất bại!');
        }
    }
}