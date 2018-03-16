$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#createIssueBtn').click(putFormInIssueModal);
});

function putFormInIssueModal() {
    $.ajax({
        method: "POST",
        url: $(this).attr('data-url')
    }).done(function (form) {
        $('#createIssueModalBody').html(form.form);
        $('#projectsSelect').change(putOwnerSelectInIssueModal);
    });
}

function putOwnerSelectInIssueModal() {
    var projectId = $(this).val();
    if (projectId > 0) {
        $.ajax({
            method: "POST",
            url: $(this).attr('data-url') + '/' + $(this).val()
        }).done(function (select) {
            $('#createIssue').append(select.select);
        });
    } else {
        $('#ownerOfIssue').remove();
    }
}