function Library() {

}

Library.prototype.showloadding = function () {
    $(".main_loadding").show();
}

Library.prototype.hideloadding = function () {
    $("#loadding").hide();
    $(".main_loadding").hide();
}
Library.prototype.alertMessageFrontend = function (type, label, message, s = 2000) {
    var vclass = 'alert';
    lclass = 'bx';
    if (type == 'primary') {
        vclass += ' alert-primary';
        lclass += ' bxs-check-circle';
    } else if (type == 'secondary') {
        vclass += ' alert-secondary';
        lclass += ' bxs-check-circle';
    } else if (type == 'success') {
        vclass += ' alert-success';
        lclass += ' bxs-check-circle';
    } else if (type == 'danger') {
        vclass += ' alert-danger';
        lclass += ' bxs-x-circle';
    } else if (type == 'warning') {
        vclass += ' alert-warning';
        lclass += ' bxs-error-circle';
    } else if (type == 'info') {
        vclass += ' alert-info';
        lclass += ' bxs-info-circle';
    } else if (type == 'light') {
        vclass += ' alert-light';
        lclass += ' bxs-check-circle';
    } else if (type == 'dark') {
        vclass += ' alert-dark';
        lclass += ' bxs-error-circle';
    } else if (type == 'white') {
        vclass += ' alert-white';
        lclass += ' bxs-error-circle';
    }
    $("#message-alert").alert();
    $("#message-alert").removeClass();
    $("#message-alert").addClass(vclass);
    $("#message-icon").removeClass();
    $("#message-icon").addClass(lclass);
    $("#message-label").html(label);
    $("#message-infor").html(message);
    $("#message-alert").fadeTo(s, 500).slideUp(500, function () {
        $("#message-alert").slideUp(500);
    })
}

Library.prototype.alertMessage = function (type, label, message, s = 2500) {
    $.toast({
        title: label,
        content: message,
        type: type,
        delay: s,
        dismissible: true,
        positionDefaults: 'top-left'
    });
    $(document).on('hidden.bs.toast', '.toast', function (e) {
        $(this).remove();
    });
}

Library = new Library();

function select_row(obj) {
    var oTable = $(obj).parent().parent().parent();
    $(oTable).find('td').parent().removeClass('selected');
    $(oTable).find('td').parent().find('input[name="chk_item_id"]').prop('checked', false);
    $(obj).parent().addClass('selected');
    var attDisabled = $(obj).parent().find('input[name="chk_item_id"]').prop('disabled');
    if (typeof (attDisabled) === 'undefined' || attDisabled == '') {
        $(obj).parent().find('input[name="chk_item_id"]').prop('checked', true);
        $(obj).parent().find('input[name="chk_item_id"]').prop('checked', 'checked');
    }
}
function checkbox_all_item_id(p_chk_obj) {
    var p_chk_obj = $('#table-data').find('input[name="chk_item_id"]');
    var v_count = p_chk_obj.length;
    //remove class cua tat ca cac tr trong table
    if ($('[name="chk_all_item_id"]').is(':checked')) {
        $(p_chk_obj).each(function () {
            $(this).prop('checked', true);
            $(this).parent().parent().addClass('selected');
        });
    } else {
        $(p_chk_obj).each(function () {
            $(this).prop('checked', false);
            $(this).parent().parent().removeClass('selected');
        });
    }
}
function checkbox_all_item_id_delete(p_chk_obj) {
    var p_chk_obj = $('#table-data-delete').find('input[name="chk_item_id"]');
    var v_count = p_chk_obj.length;
    //remove class cua tat ca cac tr trong table
    if ($('[name="chk_all_item_id"]').is(':checked')) {
        $(p_chk_obj).each(function () {
            $(this).prop('checked', true);
            $(this).parent().parent().addClass('selected');
        });
    } else {
        $(p_chk_obj).each(function () {
            $(this).prop('checked', false);
            $(this).parent().parent().removeClass('selected');
        });
    }
}