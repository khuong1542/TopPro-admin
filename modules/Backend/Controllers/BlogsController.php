<?php

namespace Modules\Backend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Backend\Services\BlogsService;

class BlogsController extends Controller
{
    private $blogsService;
    public function __construct(BlogsService $blogsService)
    {
        $this->blogsService = $blogsService;
    }
    /**
     * Trang Index
     */
    public function index()
    {
        $data = $this->blogsService->index();
        return view('blogs.index');
    }
    /**
     * Danh sách
     */
    public function loadList(Request $request)
    {
        $data = $this->blogsService->loadList($request->all());
        return $data;
    }
    /**
     * Thêm mới
     */
    public function create(Request $request)
    {
        $data = $this->blogsService->create($request->all());
        return view('blogs.add', $data);
    }
    /**
     * Sửa
     */
    public function edit(Request $request)
    {
        $data = $this->blogsService->edit($request->all());
        return view('blogs.add', $data);
    }
    /**
     * Cập nhật
     */
    public function update(Request $request)
    {
        $data = $this->blogsService->_update($request->all());
        return $data;
    }
    /**
     * Xoá
     */
    public function delete(Request $request)
    {
        $data = $this->blogsService->_delete($request->all());
        return $data;
    }
    /**
     * Cập nhật số thứ tự
     */
    public function updateOrderTable(Request $request)
    {
        $data = $this->blogsService->updateOrderTable($request->all());
        return $data;
    }
    /**
     * Cập nhật trạng thái
     */
    public function changeStatus(Request $request)
    {
        $data = $this->blogsService->changeStatus($request->all());
        return $data;
    }
    /**
     * 
     */
    public function uploadFile(Request $request)
    {
        $data = $this->blogsService->uploadFile($request->all());
        return $data;
    }
}