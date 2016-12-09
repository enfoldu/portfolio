function populateModal(modal, content) {
    $.each(content, function (key, value) {
        // Populate overview.
        modal.find('.modal-body span#' + key).text(value);
        // Populate input fields.
        modal.find('.modal-body #' + key).val(value);
        // Populate buttons.
        if (key == 'id') {
            modal.find('.modal-footer .btn-delete').data('account_number', value);
            modal.find('.modal-footer .btn-update').data('account_number', value);
        }
    });
}

function sendAjax(form, type, accountNumber) {
    handleAjax(form.attr('action'), type, form.serialize() + '&' + 'id=' + accountNumber);
}

function handleAjax(url, type, data) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax(this.href, {
        url: url,
        data: data,
        type: type,
        success: function (data) {
            location.reload();
        },
        error: function (data) {
            var errors = data.responseJSON;

            $.each(errors, function (key, value) {
                showErrors(key, value);
            });
        }
    });
}

function clearErrors(modal) {
    modal.find('.modal-body .help-block').attr('style', 'display: none').text('');
}

function showErrors(key, value) {
    $('.modal-body form').find('#' + key + '.help-block').text(value);
    $('.modal-body form').find('#' + key + '.help-block').fadeIn("slow");
}
//# sourceMappingURL=all.js.map
