$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#createUser').click(createUser);
});

function createUser() {
    var form = $('#createUserForm').find('form');
    var name = form.find('input[name="name"]');
    var email = form.find('input[name="email"]');
    var password = form.find('input[name="password"]');
    var passwordConfirmation = form.find('input[name="password_confirmation"]');
    var userType = form.find('select');
    var url = $(this).attr('data-save');

    $.ajax({
        method: "POST",
        url: url,
        data: {
            name: name.val(),
            email: email.val(),
            password: password.val(),
            password_confirmation: passwordConfirmation.val(),
            userType: userType.val()
        }
    }).done(function (datas) {
        name.val('');
        email.val('');
        password.val('');
        passwordConfirmation.val('');

        var length = ($('div#users').children().length + 1);
        var button = $('<a></a>');
        button.attr('href', datas.url);
        button.addClass('list-group-item list-group-item-action list-group-item-primary');
        button.text(length + '. ' + datas.name);

        button.appendTo($('#users'));

        $('#createUserForm').modal('hide');
    });
}