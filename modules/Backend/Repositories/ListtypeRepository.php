<?php

namespace Modules\Backend\Repositories;

use Modules\Core\BaseRepository;
use Modules\Backend\Models\ListtypeModel;

class ListtypeRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct();
    }
    public function model()
    {
        return ListtypeModel::class;
    }
}