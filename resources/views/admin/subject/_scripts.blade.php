<script>
    $("#modalUpdateSubject").on("show.bs.modal", function (event) {
        var subject = $(event.relatedTarget).data("subject");
        var modal = $(this);

        modal.find("#id").val(subject.id);
        modal.find("#description_update").val(subject.description);
        modal.find("#code_update").val(subject.code);
    });

    $("#modalDeleteSubject").on("show.bs.modal", function (event) {
        $(this).find("#id").val($(event.relatedTarget).data("id"));
    });
</script>
