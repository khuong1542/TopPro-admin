<?php

namespace Modules\Backend\Controllers;

use App\Http\Controllers\Controller;
use Modules\Backend\Services\SupportService;

class SupportController extends Controller
{
    private $supportService;
    public function __construct(SupportService $supportService)
    {
        $this->supportService = $supportService;
    }
    /**
     * Trang Index
     */
    public function index()
    {
        $data = $this->supportService->index();
        return view('support.index', $data);
    }
    /**
     * Danh sách
     */
    public function loadList(Request $request)
    {
        $data = $this->supportService->loadList($request->all());
        return $data;
    }
}