<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">{{ isset($datas) ? 'Cập nhật' : 'Thêm mới' }}</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="frmBlogs_add" autocomplete="off">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="id" id="id" value="{{ $datas->id ?? '' }}">
                <div class="mb-3 row">
                    <div class="col-md-2"><label class="required"><span>Chuyên mục</span></label></div>
                    <div class="col-md-4">
                        <select name="categories_id" id="categories_id" class="form-control chzn-select">
                            <option selected disabled value="">--Chọn chuyên mục--</option>
                            @if(isset($categories))
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-2"><label><span>Ngày đăng</span></label></div>
                    <div class="col-md-4"><input type="text" name="date_create" id="date_create" class="form-control datepicker" value="{{ $datas->date_create ?? '' }}"></div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2"><label class="required"><span>Tên bài viết</span></label></div>
                    <div class="col-md-10"><input type="text" name="title" id="title" class="form-control" placeholder="Nhập tên bài viết" value="{{ $datas->title ?? '' }}"></div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2"><label class="required"><span>Đường dẫn</span></label></div>
                    <div class="col-md-10"><input type="text" name="slug" id="slug" class="form-control" placeholder="Nhập đường dẫn" value="{{ $datas->slug ?? '' }}"></div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2"><label><span>Ảnh đại diện</span></label></div>
                    <div class="col-md-10">
                        <label for="images" class="btn btn-default mt-0">Chọn ảnh</label>
                        <input type="file" hidden name="images" id="images" onchange="showImage(this)">
                        <div id="feature_img" class="mt-1 col-md-2">
                            @if(isset($datas->images) && $datas->images)
                            <img src="{{ $datas->images }}" alt="Ảnh đại diện" width="100%">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2"><label><span>Chú thích ảnh</span></label></div>
                    <div class="col-md-10">
                        <input type="text" name="images_note" id="images_note" class="form-control" placeholder="Nhập chú thích ảnh" value="{{ $datas->images_note ?? '' }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2"><label class="required"><span>Tác giả</span></label></div>
                    <div class="col-md-4"><input type="text" name="author" id="author" class="form-control" placeholder="Nhập tên tác giả" value="{{ $datas->author ?? '' }}"></div>
                    <div class="col-md-2"><label><span>Nguồn</span></label></div>
                    <div class="col-md-4"><input type="text" name="source" id="source" class="form-control" placeholder="Nhập nguồn" value="{{ $datas->source ?? '' }}"></div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2"><label><span>Nội dung</span></label></div>
                    <div class="col-md-10"><textarea type="text" name="content" id="editor1" rows="2" class="form-control" placeholder="Nhập ghi chú">{{ $datas->content ?? '' }}</textarea></div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2"><label class="required"><span>Loại bài viết</span></label></div>
                    <div class="col-md-10">
                        <div class="row ps-0">
                            @if(isset($blog_type))
                            @foreach($blog_type as $type)
                            <div class="col-md-3">
                                <label class="form-control mt-0 border-0 ps-0 pe-0">
                                    <input type="checkbox" name="blog_type[]" @if((isset($datas->blog_type) && $datas->blog_type == $type->code) ||
                                    $type->code == 'TIN_HIEN_THI_CO_DINH') checked="true" @endif
                                    value="{{ $type->code }}"
                                    > {{ $type->name }}
                                </label>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2"><label class="required"><span>Trạng thái bài viết</span></label></div>
                    <div class="col-md-10">
                        <div class="row ps-0">
                            @if(isset($current_status))
                            @foreach($current_status as $current)
                            <div class="col-md-3">
                                <label class="form-control mt-0 border-0 ps-0 pe-0">
                                    <input type="radio" name="current_status" @if((isset($datas->current_status) && $datas->current_status == $current->code) ||
                                    $current->code == 'CHO_DUYET') checked="true" @endif
                                    value="{{ $current->code }}"
                                    > {{ $current->name }}
                                </label>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-2"><label class="required"><span>Thứ tự</span></label></div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-3"><input type="number" name="order" id="order" class="form-control" placeholder="Thứ tự" value="{{ $datas->order ?? ( $order ?? '' ) }}"></div>
                            <div class="col-md-3">
                                <label class="form-control mt-0 border-0 ps-0 pe-0">
                                    <input type="checkbox" name="status" id="status" @if(isset($datas->status) && $datas->status === 1) checked="true" @endif>
                                    <span>Hoạt động</span>
                                </label>
                            </div>
                            <div class="col-md-3">
                                <label class="form-control mt-0 border-0 ps-0 pe-0">
                                    <input type="checkbox" name="is_comment" id="is_comment" @if(isset($datas->is_comment) && $datas->is_comment === 1) checked="true" @endif>
                                    <span>Hiển thị bình luận</span>
                                </label>
                            </div>
                            <div class="col-md-3">
                                <label class="form-control mt-0 border-0 ps-0 pe-0">
                                    <input type="checkbox" name="is_hide_relate_blog" id="is_hide_relate_blog" @if(isset($datas->is_hide_relate_blog) && $datas->is_hide_relate_blog === 1) checked="true" @endif>
                                    <span>Ẩn tin liên quan</span>
                                </label>
                            </div>
                        </div>
                    </div>
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
<script>
    jQuery(document).ready(function() {
        $(".datepicker").datepicker({
            format: 'dd/mm/yyyy', // format ngày
            todayBtn: "linked", // Chọn ngày hiện tại
            clearBtn: true, // Xóa ngày đã chọn
            todayHighlight: true, // highlight thời gian hiện tại
            autoclose: true, // Đóng modal datepicker khi click chọn ngày
            weekStart: 1, // Ngày bắt đầu trong tuần (0: Chủ nhật, 1: Thứ Hai -> 6: Thứ Bảy)
        });
        $("#date_create").change(function() {
            var date = new Date;
            var pattern = /^(0?[1-9]|1[0-9]|2[0-9]|3[0-1])\/(0?[1-9]|1[0-2])\/([0-9]{4})$/;
            if (!pattern.test($("#date_create").val())) {
                let dd = date.getDate();
                if (parseInt(dd) < 10) dd = '0'.dd;
                let mm = date.getMonth() + 1;
                if (parseInt(mm) < 10) mm = '0'.mm;
                $("#date_create").val(dd + '/' + mm + '/' + date.getFullYear());
            }
        });
        $("#title").change(function() {
            var date = new Date;
            var str = Library.convertStr(($("#title").val()).trim());
            str = str + '-' + date.getTime() + '.html';
            $("#slug").val(str);
        });
        CKEDITOR.replace('editor1', {
            filebrowserBrowseUrl: '1',
            filebrowserImageBrowseUrl: '2',
            filebrowserUploadUrl: '4',
            filebrowserImageUploadUrl: 'a',
        });
    });
</script>