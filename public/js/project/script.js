$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#saveChanges').click(editProject);
    $('#addMember').click(addMember);
    $('#addMemberBtn').click(putFormInModal);
    $('#deleteMember').click(deleteMember);
});

function editProject() {
    var name = $('#projectName').val();
    var projectManager = $('#projectManager').val();
    var url = $(this).attr('data-save');
    var projectId = $('#editProjectBtn').attr('data-project');

    $.ajax({
        method: "POST",
        url: url,
        data: {
            name: name,
            projectManager: projectManager,
            id: projectId
        }
    }).done(function (datas) {
        $('#name').text(datas.name);
        $('#projectName').val(datas.name);
        $('#manager').text(datas.projectManagerName);
        $('option[value="' + datas.projectManagerId + '"]').attr('selected', 'selected');
        $('#editProjectForm').modal('hide');
    });
}

function putFormInModal() {
    $.ajax({
        method: "POST",
        url: $(this).attr('data-url')
    }).done(function (form) {
        $('#addMemberModalBody').html(form.form);
    })
}

function addMember() {
    var member = $('select[name="member"]').val();
    var url = $(this).attr('data-save') + '/' + member;

    $.ajax({
        method: "POST",
        url: url,
        data: {
            member: member
        }
    }).done(function (datas) {
        $('tr#no_members').remove();
        var button = $('<button></button>');
        button.addClass('btn btn-danger btn-sm');
        button.attr('data-delete', datas.url);
        button.attr('data-toggle', 'modal');
        button.attr('data-target', '#deleteMemberForm');
        button.text('Delete Member');

        var div = $('<div></div>');
        div.addClass('float-right');

        var tdWithName = $('<td></td>');
        tdWithName.text(datas.name);

        var tdWithEmail = $('<td></td>');
        tdWithEmail.text(datas.email);
        var tdWithButton = $('<td></td>');

        var tr = $('<tr></tr>');

        button.appendTo(div);
        div.appendTo(tdWithButton);
        tdWithName.appendTo(tr);
        tdWithEmail.appendTo(tr);
        tdWithButton.appendTo(tr);
        tr.appendTo($('tbody#members'));
        $('#addMemberForm').modal('hide');
    })
}

function deleteMember() {
    var deleteBtn = $('#deleteMemberBtn');
    var url = deleteBtn.attr('data-delete');

    $.ajax({
        method: "DELETE",
        url: url
    }).done(function (datas) {
        deleteBtn.closest('tr').remove();
        $('#deleteMemberForm').modal('hide');
    })
}