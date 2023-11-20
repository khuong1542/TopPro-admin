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
        $data = $this->repository->where('status', 1)->get()->toArray();
        return $data;
    }
}