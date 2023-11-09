@extends('layouts.index')
@section('js')
<script src="{{ URL::asset('public/dist/js/JS_Listtype.js') }}"></script>
@endsection
@section('content')
<div class="content container-fluid">
    <div class="page-header">
        @include('listtype.listtype.button')
    </div>
    <div class="page-body">
        <div class="card">
            <form id="frmListtype_index">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <div class="card-header">
                    <div class="form-search">
                        <div class="input-group wp60">
                            <input type="text" class="form-control" name="txt_search" id="txt_search" autocomplete="off" onkeydown="if (event.key == 'Enter'){search();return false;}" placeholder="Tìm kiếm ...">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-base" id="btn_search">Tìm kiếm</button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive datatable-custom">
                        <div id="datatable_wrapper" class="dataTables_wrapper no-footer">
                            <div id="table-container"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="addModal" data-bs-backdrop="static"></div>
<script>
    var baseUrl = "{{ url('') }}";
    var JS_Listtype = new JS_Listtype(baseUrl, 'listtype', 'listtype');
    jQuery(document).ready(function() {
        JS_Listtype.loadIndex();
    });
</script>
@endsection