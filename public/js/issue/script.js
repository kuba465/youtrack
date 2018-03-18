$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#createIssueBtn').click(putFormInIssueModal);
    $('#saveIssue').click(createIssue);
    $('#editIssueBtn').click(putFormInEditIssueModal);
    $('#saveIssueChanges').click(editIssue);
    $('#saveIssueDescription').click(editIssueDescription);
});

function createIssue() {
    var formDatas = $('form#createIssue').serializeArray().reduce(function (obj, item) {
        obj[item.name] = item.value;
        return obj;
    }, {});
    var url = $(this).attr('data-save');

    $.ajax({
        method: "POST",
        url: url,
        data: {datas: formDatas}
    }).done(function (datas) {
        var a = $('<a></a>');
        var length = $('div#issues').children().length + 1;
        a.attr('href', datas.issueUrl);
        a.addClass('list-group-item list-group-item-action list-group-item-warning');
        a.text(length + '. ' + datas.title + '(' + datas.status + '/' + datas.priority + ')');
        a.appendTo($('div#issues'));
        $('#createIssueForm').modal('hide');
    });
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
        $('#ownerOfIssue').remove();
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

function editIssue() {
    var title = $('input[name="title"]').val();
    var status = $('select[name="status"]').val();
    var priority = $('select[name="priority"]').val();
    var owner = $('select[name="owner"]').val();
    var estimatedTime = $('input[name="estimated_time"]').val();
    var workTime = $('input[name="work_time"]').val();
    var url = $(this).attr('data-save');

    $.ajax({
        method: "POST",
        url: url,
        data: {
            title: title,
            status: status,
            priority: priority,
            owner: owner,
            estimated_time: estimatedTime,
            work_time: workTime
        }
    }).done(function (datas) {
        console.log(datas);
        $('td#title').text(datas.title);
        $('td#owner').text(datas.owner);
        $('td#status').text(datas.status);
        $('td#priority').text(datas.priority);
        $('td#estimatedTime').text(datas.estimatedTime);
        $('td#workTime').text(datas.workTime);
        $('#editIssueForm').modal('hide');
    });
}

function putFormInEditIssueModal() {
    $.ajax({
        method: "POST",
        url: $(this).attr('data-url')
    }).done(function (form) {
        $('#editIssueModalBody').html(form.form);
    });
}

function editIssueDescription() {
    var description = $('textarea[name="description"]');
    var url = $(this).attr('data-save');

    $.ajax({
        method: "POST",
        url: url,
        data:{description: description.val()}
    }).done(function (datas) {
        description.val(datas.description);
        $('#issueDescription').text(datas.description);
        $('#editIssueDescriptionForm').modal('hide');
    });
}