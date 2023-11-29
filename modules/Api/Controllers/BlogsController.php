<?php

namespace Modules\Api\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Api\Resources\BlogsResource;
use Modules\Api\Services\BlogService;

class BlogsController extends Controller
{
    private $blogService;
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }
    public function loadList(Request $request)
    {
        $data = $this->blogService->loadList($request->all());
        return response()->json(['status' => true, 'data' => $data]);
    }
    public function reader(Request $request)
    {
        $data = $this->blogService->reader($request->all());
        return response()->json(['status' => true, 'data' => $data]);
    }
}