<?php

namespace Modules\Backend\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Modules\Backend\Repositories\BlogsRepository;
use Modules\Core\BaseService;
use Modules\Core\Helpers\ListtypeHelper;
use Modules\Core\Helpers\LoggerHelpers;

class BlogsService extends BaseService
{
    private $categoriesService;
    private $validateService;
    private $fileService;
    private $logger;
    public function __construct(
        CategoriesService $categoriesService,
        ValidateService $validateService,
        FileService $fileService
    ){
        $this->categoriesService = $categoriesService;
        $this->validateService   = $validateService;
        $this->fileService       = $fileService;
        $this->logger = new LoggerHelpers;
        $this->logger->setFileName('BlogsService');
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
    /**
     * Thêm mới
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function create($input): array
    {
        $data['blog_type'] = ListtypeHelper::_getAllByCode(['DM_LOAI_BAI_VIET']);
        $data['current_status'] = ListtypeHelper::_getAllByCode(['DM_TRANG_THAI_BAI_VIET']);
        $data['categories'] = $this->categoriesService->select('*')->orderBy('order')->get();;
        $blogs = $this->repository->select('order')->orderBy('order', 'desc')->first();
        $data['order'] = isset($blogs->order) ? (int)$blogs->order + 1 : 1;
        return $data;
    }
    /**
     * Cập nhật
     * @param $input Dữ liệu truyền vào
     * @return array
     */
    public function _update($input): array
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
        $params['date_create'] = !empty($params['date_create']) ? Carbon::createFromFormat('d/m/Y', $params['date_create'])->format('Y-m-d') : null;
        $params['content'] = $input['content'] ?? '';
        $check = $this->validateService->validate($params, 'bài viết');
        if ($check['status'] === false) {
            foreach ($check['message'] as $key => $message) {
                return array('success' => false, 'message' => $message, 'key' => $key);
            }
        }
        try {
            $this->logger->setChannel('Update')->log('Params', $input);
            if($_FILES != []){
                $images = $this->fileService->upload($_FILES);
                $params['images'] = $images[0]['url'];
            }
            $data = $this->repository->_update($params);
            return array('success' => true, 'message' => 'Cập nhật thành công', 'data' => $data);
        } catch (\Exception $e) {
            $this->logger->setChannel('Update')->log('Messages', ['Line:' => $e->getLine(), 'Message:' => $e->getMessage(), 'FileName:' => $e->getFile()]);
            return array('success' => false, 'message' => $e->getMessage());
        }
    }
}