<?php
 
namespace Modules\Backend\Services;

use Modules\Core\BaseService;
use Modules\Backend\Repositories\ListtypeRepository;

class ListtypeService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }
    public function repository()
    {
        return ListtypeRepository::class;
    }
    public function index(): array
    {
        $data = [];
        return $data;
    }
}