<?php

namespace Modules\Backend\Controllers;

use App\Http\Controllers\Controller;
use Modules\Backend\Services\ListtypeService;

class ListtypeController extends Controller
{
    private $listtypeService;
    public function __construct(ListtypeService $listtypeService)
    {
        $this->listtypeService = $listtypeService;
    }
    public function index()
    {
        $data = $this->listtypeService->index();
        return view('listtype.listtype.index');
    }
}