$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#createComment').click(createComment);
    $('#editComment').click(editComment);
    $('#deleteComment').click(deleteComment);
});

function createComment() {
    var text = $('textarea[name="comment"]');
    var url = $(this).attr('data-save');

    $.ajax({
        method: "POST",
        url: url,
        data: {description: text.val()}
    }).done(function (datas) {
        var tr = $('<tr></tr>');
        tr.attr('data-comment', datas.commentId);
        var td = $('<td></td>');
        td.text(datas.owner);
        td.appendTo(tr);

        var td = $('<td></td>');
        td.text(datas.description);
        td.addClass('description');
        td.appendTo(tr);

        var td = $('<td></td>');
        td.text(datas.updated_at);
        td.addClass('updated_at');
        td.appendTo(tr);

        var td = $('<td></td>');
        var div = $('<div></div>');
        div.addClass('float-right');

        var editButton = $('<button></button>');
        editButton.attr('data-url', datas.editRoute);
        editButton.addClass('btn btn-warning btn-sm');
        editButton.attr('data-toggle', 'modal');
        editButton.attr('data-target', '#editCommentForm');
        editButton.attr('onclick', "textOfComment($(this))");
        editButton.text('Edit');

        var deleteButton = $('<button></button>');
        deleteButton.attr('data-url', datas.deleteRoute);
        deleteButton.addClass('btn btn-danger btn-sm');
        deleteButton.attr('data-toggle', 'modal');
        deleteButton.attr('data-target', '#deleteCommentForm');
        editButton.attr('onclick', "deleteCommentLink($(this))");
        deleteButton.text('Delete');

        editButton.appendTo(div);
        deleteButton.appendTo(div);
        div.appendTo(td);
        td.appendTo(tr);
        tr.appendTo($('tbody#comments'));

        text.text('');
        $('#createCommentForm').modal('hide');
    });
}

function textOfComment(button) {
    $.ajax({
        method: "POST",
        url: button.attr('data-url')
    }).done(function (datas) {
        $('#commentText').val(datas.text);
        $('#editComment').attr('data-save', datas.editRoute)
    });
}

function editComment() {
    var text = $('textarea#commentText');
    var url = $(this).attr('data-save');

    $.ajax({
        method: "POST",
        url: url,
        data: {description: text.val()}
    }).done(function (datas) {
        var tr = $('tr[data-comment="' + datas.commentId + '"]');
        tr.find('td.description').text(datas.description);
        tr.find('td.updated_at').text(datas.updated_at);
        $('#editCommentForm').modal('hide');
    });
}

function deleteCommentLink(button) {
    $.ajax({
        method: "POST",
        url: button.attr('data-url')
    }).done(function (data) {
        $('#deleteComment').attr('data-delete', data.deleteLink);
    })
}

function deleteComment() {
    var url = $(this).attr('data-delete');

    $.ajax({
        method: "DELETE",
        url: url
    }).done(function (datas) {
        $('tr[data-comment="' + datas.commentId + '"]').remove();
        $('#deleteCommentForm').modal('hide');
    })
}