function JS_LayoutMenu(baseUrl, module, action) {
    $("#main_layoutMenu").attr('class', 'nav-link active');
    this.baseUrl = baseUrl;
    this.module = module;
    this.action = action;
    this.urlPath = baseUrl + '/' + module + (action != '' && action != undefined ? '/' + action : '');
}
/**
 * Sự kiện xảy ra
 */
JS_LayoutMenu.prototype.loadIndex = function(){
    var myClass = this;
    $('.chzn-select').chosen({height: '100%', width: '100%', search_contains: true});
    myClass.loadList();
    $("#btn_add").click(function(){
        myClass.create();
    });
    $("#btn_delete").click(function(){
        myClass.delete();
    });
}
/**
 * Sự kiện con có thể dùng chung
 */
JS_LayoutMenu.prototype.loadEvent = function(){
    
}
/**
 * Danh sách danh mục
 */
JS_LayoutMenu.prototype.loadList = function (currentPage = 1, perPage = 15) {
    var myClass = this;
    var url = myClass.urlPath + '/loadList';
    var data = 'txtSearch=' + $("#frmLayoutMenu_index #txtSearch").val();
    data += '&offset=' + currentPage;
    data += '&limit=' + perPage;
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'GET',
        data: data,
        success: function (arrResult) {
            $("#table-container").html(arrResult['arrData']);
            JS_LayoutMenu.loadEvent(myClass, 'form#frmLayoutMenu_index');
            Library.hideloadding();
            $("#frmLayoutMenu_index").find('.main_paginate .pagination a').click(function () {
                var page = $(this).attr('page');
                var perPage = $('#cbo_nuber_record_page').val();
                myClass.loadList(page, perPage);
            });
            $("#frmLayoutMenu_index").find('#cbo_nuber_record_page').change(function () {
                var page = $("#frmLayoutMenu_index").find('#_currentPage').val();
                var perPages = $("#frmLayoutMenu_index").find('#cbo_nuber_record_page').val();
                myClass.loadList(page, perPages);
            });
            $("#frmLayoutMenu_index").find('#cbo_nuber_record_page').val(arrResult['perPage']);
        }, error: function(e){
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Form thêm mới
 */
JS_LayoutMenu.prototype.create = function(){
    var myClass = this;
    var url = myClass.urlPath + '/create';
    Library.showloadding();
    $.ajax({
        url: url,
        type: 'GET',processData: false,
        contentType: false,
        success: function(arrResult){
            Library.hideloadding();
            $("#addModal").html(arrResult);
            $("#addModal").modal('show');
            $('.chzn-select').chosen({height: '100%', width: '100%', search_contains: true});
        },error: function(e){
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Form sửa
 */
JS_LayoutMenu.prototype.edit = function(id){
    
}
/**
 * Lưu thông tin
 */
JS_LayoutMenu.prototype.update = function(){

}
/**
 * Xóa thông tin
 */
JS_LayoutMenu.prototype.delete = function(){

}
/**
 * Thêm dòng mới trang index
 */
JS_LayoutMenu.prototype.addrow = function(){
    var numberRow = $("#body_data tr").length;
    var id = broofa();
    var html = '';
    html += '<tr>';
    // checkbox
    html += '<td align="center"><input type="checkbox" name="chk_item_id" value="' + id + '"></td>';
    // code
    html += '<td class="td_code_' + id + '" onclick="{select_row(this);}" ondblclick="click2(\'' + id + '\', \'code\')">';
    html += '<span id="span_code_' + id + '" class="span_code_' + id + '"></span>';
    html += '</td>';
    // name
    html += '<td class="td_name_' + id + '" onclick="{select_row(this);}" ondblclick="click2(\'' + id + '\', \'name\')">';
    html += '<span id="span_name_' + id + '" class="span_name_' + id + '"></span>';
    html += '</td>';
    // url
    html += '<td class="td_url_' + id + '" onclick="{select_row(this);}" ondblclick="click2(\'' + id + '\', \'url\')">';
    html += '<span id="span_url_' + id + '" class="span_url_' + id + '"></span>';
    html += '</td>';
    // parent_code
    html += '<td class="td_parent_code_' + id + '" onclick="{select_row(this);}" ondblclick="click2(\'' + id + '\', \'parent_code\')">';
    html += '<span id="span_parent_code_' + id + '" class="span_parent_code_' + id + '"></span>';
    html += '</td>';
    // icon
    html += '<td class="td_icon_' + id + '" onclick="{select_row(this);}" ondblclick="click2(\'' + id + '\', \'icon\')">';
    html += '<span id="span_icon_' + id + '" class="span_icon_' + id + '"></span>';
    html += '</td>';
    // class
    html += '<td class="td_class_' + id + '" onclick="{select_row(this);}" ondblclick="click2(\'' + id + '\', \'class\')">';
    html += '<span id="span_class_' + id + '" class="span_class_' + id + '"></span>';
    html += '</td>';
    // order
    html += '<td class="td_order_' + id + '" onclick="{select_row(this);}" align="center" ondblclick="click2(\'' + id + '\', \'order\')">';
    html += '<span id="span_order_' + id + '" class="span_order_' + id + '">' + (parseInt(numberRow) + 1) + '</span>';
    html += '</td>';
    // status
    html += '<td onclick="{select_row(this);}" align="center">';
    html += '<label class="custom-control custom-checkbox p-0 m-0 pointer " style="cursor: pointer;">';
    html += '<input type="checkbox" hidden class="custom-control-input toggle-status" id="status_' + id + '" data-id="' + id + '" checked>';
    html += '<span class="custom-control-indicator p-0 m-0" onclick="JS_LayoutMenu.changeStatus(\'' + id + '\')"></span>';
    html += '</label></td>';
    // edit
    html += '<td align="center"><span class="text-cursor text-warning" onclick="JS_LayoutMenu.edit(\''+id+'\')"><i class="bx bx-edit"></i></span></td>';
    html += '</tr>';
    $("#body_data").append(html);
}
/**
 * Sự kiện tạo một id mới theo uuid()
 */
function broofa(){
    return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
        var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
        return v.toString(16);
    });
}
/**
 * Sự kiện khi bấm 2 lần
 */
function click2(id, column, type = 'input'){
    $(".td_"+column+"_" + id).removeAttr('ondblclick');
    var text = $("#span_"+column+"_" + id).html();
    $("#"+column+"_" + id).removeAttr('hidden');
    if(type == 'input'){
        $("#span_"+column+"_" + id).html('<textarea name="'+column+'" id="'+column+'_' + id + '" rows="3">'+text+'</textarea>');
    }else if(type == 'select'){
        console.log('select');
    }else if(type == 'date'){
        $("#span_"+column+"_" + id).html('<input name="'+column+'" id="'+column+'_' + id + '" rows="3" value="'+ text +'" />');
        console.log('date');
    }else if(type == 'textarea'){
        console.log('textarea');
    }else if(type == 'multipleSelect'){
        console.log('multipleSelect');
    }
    $("#"+column+"_" + id).focus();
    $("#span_"+column+"_" + id).removeAttr('id');
    
    $("#"+column+"_" + id).focusout(function(){
        $(".td_"+column+"_" + id).attr('ondblclick', "click2('"+id+"', '"+column+"', '"+type+"')");
        $("#"+column+"_" + id).attr('hidden', true);
        $(".span_"+column+"_" + id).attr('id', 'span_'+column+'_' + id);
        $(".span_"+column+"_" + id).html($("#"+column+"_" + id).val());
        if(text != $(".span_" + column + '_' + id).html()){
            JS_LayoutMenu.updateColumn(id, column, $(".span_" + column + '_' + id).html());
        }
    });
}
/**
 * Cập nhật khi ở màn hình hiển thị danh sách
 */
JS_LayoutMenu.prototype.updateColumn = function(id, column, value = '') {
    var myClass = this;
    var url = myClass.urlPath + '/updateColumn';
    var data = 'id=' + id;
    data += '&_token=' + $('#frmLayoutMenu_index').find('#_token').val();
    if(column == 'code'){ data += '&code=' + (column == 'code' ? value : ""); }
    else if(column == 'name'){ data += '&name=' + value; }
    else if(column == 'url'){ data += '&url=' + value; }
    else if(column == 'parent_code'){ data += '&parent_code=' + value; }
    else if(column == 'icon'){ data += '&icon=' + value; }
    else if(column == 'class'){ data += '&class=' + value; }
    else if(column == 'order'){ data += '&order=' + value; }
    $.ajax({
        url: url,
        data: data,
        type: "PUT",
        success: function (result) {
            if (result['success'] == true) {
                Library.alertMessage('success', 'Thông báo', result['message']);
                if(column == 'order'){
                    myClass.loadList();
                }
            } else {
                Library.alertMessage('danger', 'Lỗi', result['message']);
                myClass.loadList();
            }
        }, error: function(e){
            console.log(e);
            Library.hideloadding();
        }
    });
    $("#" + id).prop('readonly');
}
/**
 * Thay đổi trạng thái
 */
JS_LayoutMenu.prototype.changeStatus = function(id){
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
        success: function(result){
            if(result['success'] == true){
                Library.alertMessage('success', 'Thông báo', result['message']);
            }else{
                Library.alertMessage('danger', 'Lỗi', result['message']);
            }
            Library.hideloadding();
        }, error: function(e){
            console.log(e);
            Library.hideloadding();
        }
    });
}
/**
 * Tìm kiếm
 */
JS_LayoutMenu.prototype.search = function(){
    JS_LayoutMenu.loadList();
}