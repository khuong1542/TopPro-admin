@extends('layouts.index')
@section('js')
<script src="{{ URL::asset('public/dist/js/JS_Categories.js') }}"></script>
@endsection
@section('content')
<div class="content container-fluid">
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="page-header-title">Quản trị danh mục</h1>
            </div>
        </div>
    </div>
</div>
<script>
    var baseUrl = "{{ url('') }}";
    var JS_Categories = new JS_Categories(baseUrl, 'admin', 'categories');
    jQuery(document).ready(function(){
        JS_Categories.loadIndex();
    });
</script>
@endsection