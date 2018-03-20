$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#addFiles').click(saveFiles);
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
        var files = $('div.files');
        $.each(datas.files, function (key, value) {
            var images = ['jpg', 'jpeg', 'png', 'gif'];
            if ($.inArray(value.extension, images) >= 0) {
                var img = $('<img>');
                img.attr('src', value.url);
                img.attr('alt', key);
                img.appendTo(files);
            } else {
                var a = $('<a></a>');
                a.addClass('btn btn-info');
                a.attr('download', true);
                a.attr('href', value.url);
                a.text(key);
                a.appendTo(files);
            }
        });
        $('#addFilesForm').modal('hide');
    });
}