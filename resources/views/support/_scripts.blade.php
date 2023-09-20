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

    $("#modalRatingSupport").on("show.bs.modal", function (event) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });
        var modal = $(this);

        var rating = '{{ $support->rating }}';

        if (rating != null) {
            modal.find(".star").filter(function () {
                return $(this).data("star-id") <= rating;
            }).removeClass("far").addClass("fas");
        }

        modal.find(".star").mouseenter(function () {
            var starId = $(this).data("star-id");

            modal.find(".star").removeClass("far").addClass("fas");

            modal.find(".star").filter(function () {
                return $(this).data("star-id") > starId;
            }).removeClass("fas").addClass("far");
        });

        modal.find(".star").click(function () {
            var selectedStarId = $(this).data("star-id");

            $.ajax({
                url: "{{ route('support.rateSupport') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    support_id: "{{ $support->id }}",
                    rating: selectedStarId
                },
                success: function (response) {
                    console.log(response);
                    Swal.fire({
                        title: response.message,
                        icon: response.status,
                        showConfirmButton: false,
                        timer: 2500
                    });

                    setTimeout(function () {
                        window.location.reload();
                    }, 3000);
                }
            });
        });
    });

    $("#modalReviewSupport").on("show.bs.modal", function (event) {
        var support = $(event.relatedTarget).data("support");
        var modal = $(this);

        modal.find("#id").val(support.id);
        modal.find("#review").val(support.review);
    });
</script>
