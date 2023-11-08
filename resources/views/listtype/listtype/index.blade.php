@extends('layouts.index')
@section('js')
<script src="{{ URL::asset('public/dist/js/JS_Listtype.js') }}"></script>
@endsection
@section('content')
<div class="content container-fluid">
    <div class="page-header">
        @include('listtype.listtype.button')
    </div>
    <div class="card">
        <form id="frmListtype_index">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <div class="table-responsive datatable-custom">
                <div id="datatable_wrapper" class="dataTables_wrapper no-footer">
                    <div id="table-container"></div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="addModal" data-bs-backdrop="static">
    <script>
        var baseUrl = "{{ url('') }}";
        var JS_Listtype = new JS_Listtype(baseUrl, 'listtype', 'listtype');
        jQuery(document).ready(function() {
            JS_Listtype.loadIndex();
        });
    </script>
    @endsection