<?php
 
namespace Modules\Backend\Services;

use Modules\Core\BaseService;
use Modules\Backend\Repositories\CategoriesRepository;

class CategoriesService extends BaseService
{
    public function __construct()
    {
        parent::__construct();
    }
    public function repository()
    {
        return CategoriesRepository::class;
    }
}