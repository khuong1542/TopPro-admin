<?php

namespace Modules\Api\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Api\Resources\BlogsResource;
use Modules\Api\Services\BlogsService;

class BlogsController extends Controller
{
    private $blogsService;
    public function __construct(BlogsService $blogsService)
    {
        $this->blogsService = $blogsService;
    }
    public function loadList(Request $request)
    {
        // dd($this->blogsService->where('blog_type', 'like', '%TIN_NOI_BAT%')->where('current_status', 'DA_DUYET')->where('status', 1)->toSql());
        $data = $this->blogsService->loadList($request->all());
        return response()->json(['status' => 200, 'data' => $data]);
    }
}