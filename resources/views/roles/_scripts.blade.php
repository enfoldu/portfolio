<script src="{{ elixir('js/table.js') }}"></script>

<script>
    // Modal is opened.
    $('#modal').on('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = $(event.relatedTarget);

        // Select first tab.
        $('.nav-tabs a:first').tab('show');

        populateModal($(this), button.data('content'));

        clearErrors($(this).find("form"));
    });

    /*// Delete button is pressed.
    $(".modal-footer .btn-delete").click(function (event) {
        sendAjax($('.modal-body form'), $(this).data('action'), $(this).data('account_number'));
    });

    // Update button is pressed.
    $(".modal-footer .btn-update").click(function (event) {
        sendAjax($('.modal-body form'), $(this).data('action'), $(this).data('account_number'));
    });*/
</script>