$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#createIssueBtn').click(putFormInIssueModal);
    $('#saveIssue').click(createIssue);
});

function createIssue() {
    var formDatas = $('form#createIssue').serializeArray().reduce(function(obj, item) {
        obj[item.name] = item.value;
        return obj;
    }, {});
    var url = $(this).attr('data-save');

    $.ajax({
        method: "POST",
        url: url,
        data: {datas: formDatas}
    }).done(function (datas) {
    <a href="{{route('issue.details', ['issue' => $issue])}}"
    class="list-group-item list-group-item-action list-group-item-success">
            {{$loop->iteration}}. {{$issue->title}}
    </a>

        var a = $('<a></a>');
    a.attr('href', datas.issueUrl);
    a.addClass('list-group-item list-group-item-action list-group-item-success');
    })
}

function putFormInIssueModal() {
    $.ajax({
        method: "POST",
        url: $(this).attr('data-url')
    }).done(function (form) {
        $('#createIssueModalBody').html(form.form);
        $('select[name="project"]').change(putOwnerSelectInIssueModal);
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
            $('#saveIssue').prop('disabled', false);
        });
    } else {
        $('#ownerOfIssue').remove();
        $('#saveIssue').prop('disabled', true);
    }
}