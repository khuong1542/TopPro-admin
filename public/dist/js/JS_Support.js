function JS_Support(baseUrl, module, action) {
    $("#active_listtype").attr('class', 'nav-item active');
    $("#main_listtype").attr('class', 'nav-link dropdown-toggle active');
    $("#collapse_listtype").attr('class', 'nav-collapse collapse show');
    $("#action_list").attr('class', 'nav-link active');
    this.baseUrl = baseUrl;
    this.module = module;
    this.action = action;
    this.urlPath = baseUrl + '/' + module + (action != '' && action != undefined ? '/' + action : '');
}
/**
 * Sự kiện xảy ra
 */
JS_Support.prototype.loadIndex = function () {
    var myClass = this;
    $('.chzn-select').chosen({ height: '100%', width: '100%', search_contains: true });
    $("#btn_update_order").click(function () {
        myClass.updateOrderTable();
    });
}
/**
 * Xóa thông tin
 */
JS_Support.prototype.delete = function () {
    var myClass = this;
    var listId = '';
    var chk_item_id = $('#table-data').find('input[name="chk_item_id"]');
    $(chk_item_id).each(function () {
        if ($(this).is(':checked')) {
            if (listId !== '') {
                listId += ',' + $(this).val();
            } else {
                listId = $(this).val();
            }
        }
    });
    if (listId == '') {
        Library.alertMessage('warning', 'Cảnh báo', 'Chọn ít nhất một danh mục để xoá!');
        return false;
    }
    var url = myClass.urlPath + '/delete';
    $.confirm({
        title: 'Thông báo',
        titleClass: 'fw-bold text-danger',
        content: 'Bạn có chắc chắn muốn xóa!',
        type: 'red',
        closeIcon: true,
        autoClose: 'cancel|9000',
        buttons: {
            delete: {
                btnClass: 'btn-primary',
                text: 'Xác nhận',
                action: function () {
                    Library.showloadding();
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: { _token: $("#_token").val(), listId: listId },
                        success: function (arrResult) {
                            Library.hideloadding();
                            if (arrResult['success'] == true) {
                                Library.alertMessage('success', 'Thông báo', arrResult['message']);
                                myClass.loadList(myClass.currentPage, myClass.perPage);
                            } else {
                                Library.alertMessage('danger', 'Lỗi', arrResult['message']);
                            }
                        }, error: function (e) {
                            console.log(e);
                            Library.hideloadding();
                        }
                    });
                }
            },
            cancel: {
                btnClass: 'btn-danger',
                text: 'Đóng',
                action: function () { }
            },
        }
    });
}