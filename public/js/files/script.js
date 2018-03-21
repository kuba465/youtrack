$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#addFiles').click(saveFiles);
    $('div.files').on('click', 'button.delete-file', deleteFile);
});

function saveFiles() {
    var formData = new FormData($('#addFilesToIssue')[0]);
    $.ajax({
        url: $(this).attr('data-save'),
        type: 'POST',
        data: new FormData($('#addFilesToIssue')[0]),
        cache: false,
        contentType: false,
        processData: false
    }).done(function (datas) {
        if (datas.count > 0) {
            var files = $('div.files');

            $.each(datas.files, function (key, value) {
                $('<hr>').appendTo(files);

                var row = $('<div></div>');
                row.attr('data-file', value.id);
                row.addClass('row');

                var images = ['jpg', 'jpeg', 'png', 'gif'];
                var divMd9 = $('<div></div>');
                divMd9.addClass('col-md-9');

                if ($.inArray(value.extension, images) >= 0) {
                    var img = $('<img>');
                    img.attr('src', value.url);
                    img.attr('alt', key);
                    img.appendTo(divMd9);
                } else {
                    var a = $('<a></a>');
                    a.attr('href', value.url);
                    a.addClass('btn btn-info');
                    a.attr('download', true);
                    a.text(key);
                    a.appendTo(divMd9);
                }

                var divMd3 = $('<div></div>');
                divMd3.addClass('col-md-3');

                var button = $('<button></button>');
                button.addClass('btn btn-danger btn-sm delete-file');
                button.attr('data-delete', value.deleteUrl);
                button.attr('data-message', datas.message);
                button.text(datas.text);
                button.appendTo(divMd3);

                divMd9.appendTo(row);
                divMd3.appendTo(row);
                row.appendTo(files);
            });
        }
        $('#addFilesForm').modal('hide');
    });
}

function deleteFile() {
    var url = $(this).attr('data-delete');
    var confirm = window.confirm($(this).attr('data-message'));

    if (confirm) {
        $.ajax({
            method: "DELETE",
            url: url
        }).done(function (datas) {
            var divToRemove = $('div[data-file="' + datas.fileId + '"]');
            divToRemove.prev().remove();
            divToRemove.remove();
        });
    }
}