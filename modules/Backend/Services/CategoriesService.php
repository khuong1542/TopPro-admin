<?php
 
namespace Modules\Backend\Services;

use Modules\Core\BaseService;
use Modules\Backend\Repositories\CategoriesRepository;

class CategoriesService extends BaseService
{
    private $listtypeService;
    public function __construct(ListtypeService $listtypeService)
    {
        $this->listtypeService = $listtypeService;
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
        $data['order'] = $this->repository->select('id')->count() + 1;
        return $data;
    }
    /**
     * 
     */
    public function addList($input): array
    {
        $data = [];
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
        $check = $this->validateService->validate($input, 'danh mục');
        if ($check['status'] === false) {
            foreach ($check['message'] as $key => $message) {
                return array('success' => false, 'message' => $message, 'key' => $key);
            }
        }
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