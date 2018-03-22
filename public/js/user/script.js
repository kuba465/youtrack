$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#createUser').click(createUser);
    $('#saveUserChanges').click(editUser);
    $('#deleteUser').click(deleteUser);
    $('#addIssueBtn').click(putFormInIssueModalFromUser);
});

function createUser() {
    var form = $('#createUserForm').find('form');
    var name = form.find('input[name="name"]');
    var email = form.find('input[name="email"]');
    var password = form.find('input[name="password"]');
    var passwordConfirmation = form.find('input[name="password_confirmation"]');
    var userType = form.find('select[name="userType"]');
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

function editUser() {
    var form = $('#editUserForm').find('form');
    var name = form.find('input[name="name"]');
    var email = form.find('input[name="email"]');
    var userType = form.find('select[name="userType"]');
    var url = $(this).attr('data-save');

    console.log(userType);

    $.ajax({
        method: "POST",
        url: url,
        data: {
            name: name.val(),
            email: email.val(),
            userType: userType.val()
        }
    }).done(function (datas) {
        name.val(datas.name);
        email.val(datas.email);
        userType.find('option[value="' + datas.role + '"]').attr('selected', 'selected');

        $('#userName').text(datas.name);
        $('#userEmail').text(datas.email);
        $('#userRole').text(datas.roleDescription);
        $('#editUserForm').modal('hide');
    });
}

function putFormInIssueModalFromUser() {
    $.ajax({
        method: "POST",
        url: $(this).attr('data-url')
    }).done(function (form) {
        $('#createIssueModalBody').html(form.form);
        $('select[name="project"]').change(enableSubmitButton);
    });
}

function enableSubmitButton() {
    var projectId = $(this).val();
    if (projectId > 0) {
        $('#saveIssueFromUser').prop('disabled', false);
    } else {
        $('#saveIssueFromUser').prop('disabled', true);
    }
}

function deleteUser() {
    var url = $(this).attr('data-delete');
    $.ajax({
        method: "DELETE",
        url: url
    }).done(function (datas) {
        window.location = datas.home;
    });
}