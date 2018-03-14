$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#saveChanges').click(editProject);
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