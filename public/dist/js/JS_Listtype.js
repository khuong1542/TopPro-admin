function JS_Listtype(baseUrl, module, action) {
    $("#active_listtype").attr('class', 'nav-item active');
    $("#main_listtype").attr('class', 'nav-link dropdown-toggle active');
    $("#action_listtype").attr('class', 'nav-link active');
    $("#collapse_listtype").attr('class', 'nav-collapse collapse show');
    this.baseUrl = baseUrl;
    this.module = module;
    this.action = action;
    this.urlPath = baseUrl + '/' + module + (action != '' && action != undefined ? '/' + action : '');
}
/**
 * Sự kiện xảy ra
 */
JS_Listtype.prototype.loadIndex = function () {
    var myClass = this;
    $('.chzn-select').chosen({ height: '100%', width: '100%', search_contains: true });
    myClass.loadList();
    $("#btn_add").click(function () {
        myClass.create();
    });
    $("#btn_edit").click(function () {
        myClass.edit();
    });
    $("#btn_delete").click(function () {
        myClass.delete();
    });
}
/**
 * Sự kiện con có thể dùng chung
 */
JS_Listtype.prototype.loadEvent = function () {
    var myClass = this;
    $("#btn_update").click(function () {
        myClass.update(false);
    });
    $("#btn_update_close").click(function () {
        myClass.update(true);
    });
    $("#btn_saveImport").click(function () {
        myClass.saveImport();
    });
    $("input").on('keydown', function(){
        $(this).removeClass('border-danger');
    });
}
/**
 * Danh sách
 */
JS_Listtype.prototype.loadList = function (currentPage = 1, perPage = 15) {
    var oForm = '#frmListtype_index';
    var myClass = this;
    var url = myClass.urlPath + '/loadList';
    var data = 'txtSearch=' + $(oForm).find("#txtSearch").val();
    data += '&offset=' + currentPage;
    data += '&limit=' + perPage;
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'GET',
        data: data,
        success: function (arrResult) {
            $("#table-container").html(arrResult['arrData']);
            JS_Listtype.loadEvent(myClass, oForm);
            Library.hideloadding();
            $(oForm).find('.main_paginate .pagination a').click(function () {
                var page = $(this).attr('page');
                var perPage = $('#cbo_nuber_record_page').val();
                myClass.loadList(page, perPage);
            });
            $(oForm).find('#cbo_nuber_record_page').change(function () {
                var page = $(oForm).find('#_currentPage').val();
                var perPages = $(oForm).find('#cbo_nuber_record_page').val();
                myClass.loadList(page, perPages);
            });
            $(oForm).find('#cbo_nuber_record_page').val(arrResult['perPage']);
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Form thêm mới
 */
JS_Listtype.prototype.create = function () {
    var myClass = this;
    var url = myClass.urlPath + '/create';
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'GET', processData: false,
        contentType: false,
        success: function (arrResult) {
            Library.hideloadding();
            $("#addModal").html(arrResult);
            $("#addModal").modal('show');
            $("#status").attr('checked', true);
            $('.chzn-select').chosen({ height: '100%', width: '100%', search_contains: true });
            myClass.loadEvent();
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Form sửa
 */
JS_Listtype.prototype.edit = function (id) {

}
/**
 * Lưu thông tin
 * @return string
 */
JS_Listtype.prototype.update = function (type = false) {
    var myClass = this;
    var oForm = 'form#frmListtype_add';
    var url = this.urlPath + '/update';
    var order = $("#order").val();
    var data = $(oForm).serialize();
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function (arrResult) {
            Library.hideloadding();
            if (arrResult['success'] == true) {
                Library.alertMessage('success', 'Thông báo', arrResult['message']);
                $(oForm)[0].reset();
                $(oForm).find('#order').val(parseInt(order) + 1);
                if(type){
                    $(".modal").modal('hide');
                    myClass.loadList();
                }
            } else {
                Library.alertMessage('danger', 'Lỗi', arrResult['message']);
                $("#" + arrResult.key).focus();
            }
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Xóa thông tin
 */
JS_Listtype.prototype.delete = function () {

}
/**
 * Thêm dòng mới trang index
 */
JS_Listtype.prototype.addrow = function () {

}
/**
 * Sự kiện tạo một id mới theo uuid()
 */
JS_Listtype.prototype.broofa = function () {
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
        var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
        return v.toString(16);
    });
}
/**
 * Sự kiện khi bấm 2 lần
 */
JS_Listtype.prototype.click2 = function (id, column, type = 'input') {
    var myClass = this;
    $(".td_" + column + "_" + id).removeAttr('ondblclick');
    var text = $("#span_" + column + "_" + id).html();
    $("#" + column + "_" + id).removeAttr('hidden');
    if (type == 'input') {
        $("#span_" + column + "_" + id).html('<textarea name="' + column + '" id="' + column + '_' + id + '" rows="3">' + text + '</textarea>');
    } else if (type == 'select') {
        console.log('select');
    } else if (type == 'date') {
        $("#span_" + column + "_" + id).html('<input name="' + column + '" id="' + column + '_' + id + '" rows="3" value="' + text + '" />');
        console.log('date');
    } else if (type == 'textarea') {
        console.log('textarea');
    } else if (type == 'multipleSelect') {
        console.log('multipleSelect');
    }
    $("#" + column + "_" + id).focus();
    $("#span_" + column + "_" + id).removeAttr('id');

    $("#" + column + "_" + id).focusout(function () {
        $(".td_" + column + "_" + id).attr('ondblclick', "click2('" + id + "', '" + column + "', '" + type + "')");
        $("#" + column + "_" + id).attr('hidden', true);
        $(".span_" + column + "_" + id).attr('id', 'span_' + column + '_' + id);
        $(".span_" + column + "_" + id).html($("#" + column + "_" + id).val());
        if (text != $(".span_" + column + '_' + id).html()) {
            myClass.updateColumn(id, column, $(".span_" + column + '_' + id).html());
        }
    });
}
/**
 * Cập nhật khi ở màn hình hiển thị danh sách
 */
JS_Listtype.prototype.updateColumn = function (id, column, value = '') {
    var oForm = '#frmListtype_index';
    var myClass = this;
    var url = myClass.baseUrl + '/updateColumn';
    var data = 'id=' + id;
    data += '&_token=' + $(oForm).find('#_token').val();
    if (column == 'code') { data += '&code=' + (column == 'code' ? value : ""); }
    else if (column == 'name') { data += '&name=' + value; }
    else if (column == 'order') { data += '&order=' + value; }
    $.ajax({
        url: url,
        data: data,
        type: "PUT",
        success: function (result) {
            if (result['success'] == true) {
                Library.alertMessage('success', 'Thông báo', result['message']);
                if (column == 'order') {
                    myClass.loadList();
                }
            } else {
                Library.alertMessage('danger', 'Lỗi', result['message']);
                myClass.loadList();
            }
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
    $("#" + id).prop('readonly');
}
/**
 * Thay đổi trạng thái
 */
JS_Listtype.prototype.changeStatus = function (id) {
    var myClass = this;
    var url = myClass.urlPath + '/changeStatus';
    var data = '_token=' + $(this.oFormIndex + " #_token").val();
    data += '&status=' + ($("#status_" + id).is(":checked") ? 0 : 1);
    data += '&id=' + id;
    Library.showloadding();
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        success: function (result) {
            if (result['success'] == true) {
                Library.alertMessage('success', 'Thông báo', result['message']);
            } else {
                Library.alertMessage('danger', 'Lỗi', result['message']);
            }
            Library.hideloadding();
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Tìm kiếm
 */
JS_Listtype.prototype.search = function () {
    JS_Listtype.loadList();
}