<script>
    $("#subject_create").select2({
        placeholder: "Selecione um assunto",
        width: "100%",
        dropdownParent: $("#modalCreateSupport .modal-body")
    });

    $("#modalViewSupport").on("show.bs.modal", function (event) {
        var support = $(event.relatedTarget).data("support");
        var modal = $(this);

        modal.find("#subject_update option[value='" + support.subject_id + "']").prop("selected", true).trigger("change");
        modal.find("#description_update").val(support.description);
    });
</script>
