<?php

namespace Modules\Backend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Backend\Services\ListtypeService;

class ListtypeController extends Controller
{
    private $listtypeService;
    public function __construct(ListtypeService $listtypeService)
    {
        $this->listtypeService = $listtypeService;
    }
    /**
     * Trang Index
     */
    public function index()
    {
        $data = $this->listtypeService->index();
        return view('listtype.listtype.index');
    }
    /**
     * Danh sách
     */
    public function loadList(Request $request)
    {
        $data = $this->listtypeService->loadList($request->all());
        return $data;
    }
    /**
     * Thêm mới
     * Request
     */
    public function create(Request $request)
    {
        $data = $this->listtypeService->create($request->all());
        return view('listtype.listtype.add', $data);
    }
    /**
     * Sửa
     */
    public function edit(Request $request)
    {
        $data = $this->listtypeService->create($request->all());
        return view('listtype.listtype.add', $data);
    }
    /**
     * Cập nhật
     */
    public function update(Request $request)
    {
        $data = $this->listtypeService->_update($request->all());
        return $data;
    }
}