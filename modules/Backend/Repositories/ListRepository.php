<?php

namespace Modules\Backend\Repositories;

use Modules\Core\BaseRepository;
use Modules\Backend\Models\ListModel;

class ListRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct();
    }
    public function model()
    {
        return ListModel::class;
    }
}