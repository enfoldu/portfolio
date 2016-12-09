<script src="{{ elixir('js/table.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script>
    // Modal is opened.
    $('#modal').on('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = $(event.relatedTarget);

        // Select first tab.
        $('.nav-tabs a:first').tab('show');

        populateModal($(this), button.data('content'));

        // Populate select2 with roles.
        $.each(button.data('content'), function (key, value) {
            roles = [];
            if (key == 'roles') {
                $.each(value, function (key, value) {
                    $.each(value, function (key, value) {
                        if (key == 'short_name') {
                            roles.push(value);
                        }
                    });
                    $(".role-selector").val(roles).trigger("change");
                });
            }
        });

        clearErrors($(this).find("form"));
    });
</script>

<script type="text/javascript">
    $(".role-selector").select2();
</script>