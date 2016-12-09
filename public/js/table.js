/*=============================================
 =                Listeners                  =
 =============================================*/

/**
 *   Listens for button clicks within modal.
 *
 */
$("#modal :button").click(function (event) {
    handleClick($(this));
});

/**
 *  Listens for link clicks within modal.
 *
 */
$("#modal a").click(function (event) {
    handleClick($(this));
});

/*=============================================
 =                  Functions               =
 =============================================*/

/**
 *  Populates modal with specific content.
 *
 */
function populateModal(modal, content) {
    $.each(content, function (key, value) {
        // Populate overview.
        modal.find('.modal-body span#' + key).text(value);
        // Populate input fields.
        modal.find('.modal-body #' + key).val(value);
        // Populate buttons.
        if (key == 'id') {
            $.each(modal.find('[data-method]'), function (k, v) {
                modal.find(v).data('url', modal.find('form').attr('action') + '/' + value);
            });
        }
    });
}

/**
 *  Sends ajax request.
 *
 */
function sendAjax(form, url, type, options) {

    var formData = form.serializeArray();

    formData.push({name: 'options', value: options});

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax(this.href, {
        url: url,
        data: formData,
        type: type,
        success: function (data) {
            location.reload();
        },
        error: function (data) {
            var errors = data.responseJSON;
            handleErrors(form, errors);
        }
    });
}

function handleErrors(form, errors) {
    clearErrors(form);
    $.each(errors, function (key, value) {
        form.find('#' + key + '.help-block').text(value).fadeIn("slow");
    });
}

function clearErrors(form) {
    form.find('.help-block').attr('style', 'display: none').text('');
}

/**
 *  Checks if item clicked has a method.
 *  If found then send ajax request.
 *
 */
function handleClick(item) {
    var method = item.data('method');

    // Check if click has method (POST, DELETE)
    if (typeof method !== typeof undefined && method !== false) {
        sendAjax($("#modal form"), item.data('url'), method, JSON.stringify($('.role-selector').val()));
    }
}
//# sourceMappingURL=table.js.map
