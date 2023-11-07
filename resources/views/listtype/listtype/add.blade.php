<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">Thêm mới</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="frmAddListtype">
                <div class="mb-3 row">
                    <div class="col-md-3"><label class="required"><span>Mã danh mục</span></label></div>
                    <div class="col-md-9"><input type="text" name="code" id="code" class="form-control" placeholder="Nhập mã danh mục"></div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3"><label class="required"><span>Tên danh mục</span></label></div>
                    <div class="col-md-9"><input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên danh mục"></div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-3"><label class="required"><span>Thứ tự</span></label></div>
                    <div class="col-md-3"><input type="text" name="order" id="order" class="form-control" placeholder="Thứ tự"></div>
                    <div class="col-md-6"><label><input type="checkbox" name="status" id="status"> Hoạt động</label></div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Send message</button>
        </div>
    </div>
</div>