function JS_Categories(baseUrl, module, action) {
    $("#main_categories").attr('class', 'nav-link active');
    this.baseUrl = baseUrl;
    this.module = module;
    this.action = action;
    this.urlPath = baseUrl + '/' + module + (action != '' && action != undefined ? '/' + action : '');
    this.oFormIndex = '#frmCategories_index';
    this.oFormAdd = '#frmCategories_add';
}
/**
 * Sự kiện xảy ra
 */
JS_Categories.prototype.loadIndex = function () {
    var myClass = this;
    $('.chzn-select').chosen({ height: '100%', width: '100%', search_contains: true });
    myClass.loadList();
    $("#btn_add").click(function () {
        myClass.create();
    });
    $("#btn_delete").click(function () {
        myClass.delete();
    });
}
/**
 * Danh sách
 */
JS_Categories.prototype.loadList = function (currentPage = 1, perPage = 15) {
    var myClass = this;
    var oForm = myClass.oFormIndex;
    var url = myClass.urlPath + '/loadList';
    var data = 'txt_search=' + $(oForm).find("#txt_search").val();
    data += '&offset=' + currentPage;
    data += '&limit=' + perPage;
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'GET',
        data: data,
        success: function (arrResult) {
            $("#table-container").html(arrResult['arrData']);
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
JS_Categories.prototype.create = function () {
    var myClass = this;
    var url = myClass.urlPath + '/create';
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'GET',
        success: function (arrResult) {
            Library.hideloadding();
            $("#addModal").html(arrResult);
            $("#addModal").modal('show');
            $("#status").attr('checked', true);
            $('.chzn-select').chosen({ height: '100%', width: '100%', search_contains: true });
            $("#btn_add_layout").click(function () { myClass.addList('layout', 'DM_LAYOUT') });
            $("#btn_add_type").click(function () { myClass.addList('type', 'DM_CATEGORY_TYPE') });
            $("#btn_update").click(function () {
                myClass.update(false);
            });
            $("#btn_update_close").click(function () {
                myClass.update(true);
            });
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Thêm danh mục đối tượng
 */
JS_Categories.prototype.addList = function (id, code) {
    var myClass = this;
    var url = this.urlPath + '/addList';
    var data = {
        _token: $("#_token").val(),
        code: code,
    };
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'GET',
        data: data,
        success: function (arrResult) {
            Library.hideloadding();
            $("#addModal").modal('hide');
            $("#addList").html(arrResult);
            $("#addList").modal('show');
            $("#frmList_add #status").attr('checked', true);
            $("#btn_update_list").click(function(){
                myClass.updateList(id, false);
            });
            $("#btn_update_list_close").click(function(){
                myClass.updateList(id, true);
            });
            $("#btn_add_listtype").click(function(){
                myClass.addListtype(id, false);
            });
            $(".btn_close_list").click(function(){
                $("#addList").modal('hide');
                $("#addModal").modal('show');
            });
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * 
 */
JS_Categories.prototype.updateList = function(id, type){
    var myClass = this;
    var url = this.urlPath + '/updateList';
    var data = {
        _token: $("#_token").val(),
        dataUpdate: $("#frmList_add").serialize(),
    };
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function (arrResult) {
            Library.hideloadding();
            if (arrResult['success'] == true) {
                $("#" + id).append('<option value="' + arrResult['data']['code'] + '">' + arrResult['data']['name'] + '</option>');
                $(".chzn-select").trigger('chosen:updated');
                $("#frmList_add")[0].reset();
                $("#frmList_add #order").val(parseInt(arrResult['data']['order']) + 1);
                if(type){
                    $("#addList").modal('hide');
                    $("#addModal").modal('show');
                }
            } else {
                Library.alertMessage('danger', 'Lỗi', arrResult['message']);
            }
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Thêm mới danh mục
 */
JS_Categories.prototype.addListtype = function(){
    var myClass = this;
    var url = this.urlPath + '/addListtype';
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'GET',
            success: function (arrResult) {
                Library.hideloadding();
                $("#addList").modal('hide');
                $("#addListtype").html(arrResult);
                $("#addListtype").modal('show');
                $("#frmListtype_add #status").attr('checked', true);
                $("#btn_update_listtype").click(function(){
                    myClass.updateListtype(id);
                });
                $(".btn_close_listtype").click(function(){
                    $("#addListtype").html('');
                    $("#addListtype").modal('hide');
                    $("#addList").modal('show');
                });
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Cập nhật danh mục
 */
JS_Categories.prototype.updateListtype = function(){
    var myClass = this;
    var url = this.urlPath + '/updateListtype';
    var data = {
        _token: $("#_token").val(),
        dataUpdate: $("#frmListtype_add").serialize(),
    };
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function (arrResult) {
            Library.hideloadding();
            if (arrResult['success'] == true) {
                console.log(arrResult);
                $("#frmList_add #listtype_name").val(arrResult['data']['name']);
                $("#frmList_add #listtype_id").val(arrResult['data']['id']);
                $("#frmList_add #order").val(arrResult['order']);
                $("#addListtype").html('');
                $("#addListtype").modal('hide');
                $("#addList").modal('show');
            } else {
                Library.alertMessage('danger', 'Lỗi', arrResult['message']);
                Library.hideloadding();
            }
        }, error: function (e) {
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Form sửa
 */
JS_Categories.prototype.edit = function (id) {

}
/**
 * Lưu thông tin
 */
JS_Categories.prototype.update = function () {
    var myClass = this;
    var oForm = myClass.oFormAdd;
    var url = this.urlPath + '/update';
    var data = $(oForm).serialize();
    // var check = myClass.validateForm(myClass, oForm);
    // if (check == false) {
    //     return false;
    // }
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function (arrResult) {
            if (arrResult['success'] == true) {
                $(".modal").modal('hide');
                Library.alertMessage('success', 'Thông báo', arrResult['message']);
                myClass.loadList();
            } else {
                myClass.loadList();
                Library.alertMessage('danger', 'Lỗi', arrResult['message']);
                Library.hideloadding();
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
JS_Categories.prototype.delete = function () {

}
/**
 * Thêm dòng mới trang index
 */
JS_Categories.prototype.addrow = function () {

}
/**
 * Sự kiện tạo một id mới theo uuid()
 */
JS_Categories.prototype.broofa = function () {
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
        var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
        return v.toString(16);
    });
}
/**
 * Sự kiện khi bấm 2 lần
 */
JS_Categories.prototype.click2 = function (id, column, type = 'input') {
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
JS_Categories.prototype.updateColumn = function (id, column, value = '') {
    var myClass = this;
    var oForm = myClass.oFormIndex;
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
JS_Categories.prototype.changeStatus = function (id) {
    var myClass = this;
    var url = myClass.urlPath + '/changeStatus';
    var data = '_token=' + $("#_token").val();
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
JS_Categories.prototype.search = function () {
    JS_Categories.loadList();
}