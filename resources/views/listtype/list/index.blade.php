@extends('layouts.index')
@section('js')
<script src="{{ URL::asset('public/dist/js/JS_List.js') }}"></script>
@endsection
@section('content')
<div class="content container-fluid">
    <div class="page-header">
        @include('listtype.list.button')
    </div>
    <div class="page-body">
        <div class="card">
            <form id="frmListtype_index">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <div class="card-header">
                    <div class="row">
                        @include('listtype.list.search')
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
    var JS_List = new JS_List(baseUrl, 'listtype', 'list');
    jQuery(document).ready(function() {
        JS_List.loadIndex();
    });
</script>
@endsection