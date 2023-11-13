<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">Thêm mới</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="frmCategories_add" autocomplete="off">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" id="id" value="{{ $datas->id ?? '' }}">
                <div class="mb-3 row">
                    <div class="col-md-3"><label class="required"><span>Mã chuyên mục</span></label></div>
                    <div class="col-md-9">
                        <input type="text" name="code" id="code" class="form-control" placeholder="Nhập mã chuyên mục" value="{{ $datas->code ?? '' }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3"><label class="required"><span>Tên chuyên mục</span></label></div>
                    <div class="col-md-9"><input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên chuyên mục" value="{{ $datas->name ?? '' }}"></div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3"><label class="required"><span>Đường dẫn</span></label></div>
                    <div class="col-md-9"><input type="text" name="slug" id="slug" class="form-control" placeholder="Nhập đường dẫn" value="{{ $datas->slug ?? '' }}"></div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3"><label><span>Layout</span></label></div>
                    <div class="col-md-8">
                        <select name="layout" id="layout" class="form-control chzn-select">
                            <option value="">--Chọn layout--</option>
                            @if(isset($layout))
                            @foreach($layout as $key => $value)
                            <option value="{{ $value->code }}">{{ $value->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-1 pr-0" align="right">
                        <button type="button" class="btn btn-primary" id="btn_add_layout"><i class="bx bx-plus"></i></button>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3"><label><span>Loại chuyên mục</span></label></div>
                    <div class="col-md-8">
                        <select name="type" id="type" class="form-control chzn-select">
                            <option value="">--Chọn loại chuyên mục--</option>
                            @if(isset($type))
                            @foreach($type as $key => $value)
                            <option value="{{ $value->code }}">{{ $value->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-1 pr-0" align="right">
                        <button type="button" class="btn btn-primary" id="btn_add_type"><i class="bx bx-plus"></i></button>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3"><label><span>Icon</span></label></div>
                    <div class="col-md-9"><input type="text" name="icon" id="icon" class="form-control" placeholder="Nhập Icon" value="{{ $datas->icon ?? '' }}"></div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3"><label><span>Ghi chú</span></label></div>
                    <div class="col-md-9"><textarea type="text" name="note" id="note" rows="2" class="form-control" placeholder="Nhập ghi chú">{{ $datas->note ?? '' }}</textarea></div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3"><label><span>Ảnh đại diện</span></label></div>
                    <div class="col-md-3">
                        <label for="images" class="btn btn-default mt-0">Chọn ảnh</label>
                        <input type="file" hidden name="images" id="images">
                    </div>
                    <div class="col-md-6">
                        <label class="form-control mt-0 border-0"><input type="checkbox" name="is_display_menu" id="is_display_menu"> Hiển thị trang chủ</label>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3"><label class="required"><span>Thứ tự</span></label></div>
                    <div class="col-md-3"><input type="number" name="order" id="order" class="form-control" placeholder="Thứ tự" value="{{ $datas->order ?? ( $order ?? '' ) }}"></div>
                    <div class="col-md-6"><label class="form-control mt-0 border-0"><input type="checkbox" name="status" id="status" {{ $checked ?? '' }}> Hoạt động</label></div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            @if(!isset($datas->id))
            <button type="button" id="btn_update" class="btn btn-info">Lưu & Thêm</button>
            @endif
            <button type="button" id="btn_update_close" class="btn btn-primary">Lưu & Đóng</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
        </div>
    </div>
</div>