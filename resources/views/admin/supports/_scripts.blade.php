<script>
    $("#subject_update").select2({
        placeholder: "Selecione um assunto",
        width: "100%",
        dropdownParent: $("#modalUpdateSupport .modal-body")
    });

    $("#assistant_update").select2({
        placeholder: "Selecione um assistente",
        width: "100%",
        dropdownParent: $("#modalUpdateSupport .modal-body")
    });

    $("#status_update").select2({
        placeholder: "Selecione um status",
        width: "100%",
        dropdownParent: $("#modalUpdateSupport .modal-body")
    });

    $("#modalUpdateSupport").on("show.bs.modal", function (event) {
        var support = $(event.relatedTarget).data("support");
        var modal = $(this);

        modal.find("#id").val(support.id);
        modal.find("#name_update").val(support.requester.name);
        modal.find("#code_update").val(support.code);
        modal.find("#subject_update option[value='" + support.subject_id + "']").prop("selected", true).trigger("change");
        modal.find("#description_update").val(support.description);
        modal.find("#status_update option[value='" + support.status + "']").prop("selected", true).trigger("change");
    });

    $(".custom-file-label").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").html(fileName);
    });
</script>
