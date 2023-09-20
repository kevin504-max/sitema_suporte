<script>
    $("#modalViewUser").on("show.bs.modal", function (event) {
        var user = $(event.relatedTarget).data("user");
        var modal = $(this);

        modal.find("#name").val(user.name);
        modal.find("#email").val(user.email);
        modal.find("#cpf").val(user.cpf);
        modal.find("#created_at").val(new Date(user.created_at).toLocaleString("pt-BR"));
    });

    $("#modalDeleteUser").on("show.bs.modal", function (event) {
        $(this).find("#id").val($(event.relatedTarget).data("id"));
    });
</script>
