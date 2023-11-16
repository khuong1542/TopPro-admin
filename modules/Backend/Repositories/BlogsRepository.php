<?php

namespace Modules\Backend\Repositories;

use Modules\Backend\Models\BlogsModel;
use Modules\Core\BaseRepository;

class BlogsRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct();
    }
    public function model()
    {
        return BlogsModel::class;
    }
}