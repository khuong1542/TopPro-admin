<?php
 
namespace Modules\Backend\Services;

use Modules\Core\BaseService;
use Modules\Backend\Repositories\ListRepository;

class ListService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }
    public function repository()
    {
        return ListRepository::class;
    }
}