<?php

namespace Modules\Api\Services;

use Modules\Api\Repositories\BlogsRepository;
use Modules\Api\Resources\BlogsResource;
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
    public function loadList($input): array
    {
        $data['hot_news'] = $this->repository->select('*')->where('blog_type', 'like', '%TIN_NOI_BAT%')->where('current_status', 'DA_DUYET')->where('status', 1)->get()->toArray();
        $data['latest_news'] = $this->repository->select('*')->where('blog_type', 'like', '%TIN_MOI%')->where('current_status', 'DA_DUYET')->where('status', 1)->get()->toArray();
        $data['main_news'] = $this->repository->select('*')->where('blog_type', 'like', '%TIN_HIEN_THI_CO_DINH%')->where('current_status', 'DA_DUYET')->where('status', 1)->get()->toArray();
        $data['notification_news'] = $this->repository->select('*')->where('blog_type', 'like', '%THONG_BAO%')->where('current_status', 'DA_DUYET')->where('status', 1)->get()->toArray();
        $data = $this->repository->where('status', 1)->get()->toArray();
        return $data;
    }
}