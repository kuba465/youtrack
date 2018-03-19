<?php

return [
    'dashboard' => [
        'header' => 'Your projects'
    ],

    'buttons' => [
        'edit' => 'Edit',
        'delete' => 'Delete',
        'close' => 'Close',
        'save' => 'Save'
    ],

    'global' => [
        'created_at' => 'Created',
        'updated_at' => 'Last update',
    ],

    'user' => [
        'details' => "Datas",
        'user_plural' => 'Users',
        'create' => 'Create user',
        'edit' => 'Edit user',
        'name' => 'Name',
        'email' => 'E-mail',
        'password' => 'Password',
        'password_confirmation' => 'Confirm password',
        'role' => 'Role',
        'profile' => 'My profile',
        'no_projects' => 'You don\'t have any projects',
        'no_users' => 'There are no users',
        'form' => [
            'name_placeholder' => 'Enter name',
            'email_placeholder' => 'Enter e-mail',
            'password_placeholder' => 'Enter password',
            'password_confirmation_placeholder' => 'Confirm password',
            'role' => 'Choose type of user',
        ],
    ],

    'project' => [
        'details' => 'Project details',
        'project_plural' => 'Projects',
        'create' => 'Create project',
        'edit' => 'Edit project',
        'name' => 'Name',
        'manager' => 'Project Manager',
        'deleting' => 'Project deleting',
        'delete' => 'Delete project',
        'delete_message' => 'Do you really want to delete this project?',
        'no_projects' => 'There are no projects',
        'form' => [
            'name' => 'Name of project',
            'name_placeholder' => 'Enter name of project',
            'choose_manager' => 'Choose project manager',
        ],
        'member' => [
            'singular' => 'Member',
            'plural' => 'Members',
            'details' => 'Details',
            'add' => 'Add member',
            'name' => 'Name',
            'email' => 'E-mail',
            'choose' => 'Choose user',
            'deleting' => 'Member deleting',
            'delete' => 'Delete member',
            'delete_message' => 'Do you really want to delete member from this project?',
            'no_members' => 'There are no members',
        ],
    ],

    'issue' => [
        'details' => 'Issue Details',
        'issue_plural' => 'Issues',
        'create' => 'Create issue',
        'edit' => 'Edit issue',
        'title' => 'Title',
        'description' => 'Description',
        'project' => 'Project',
        'owner' => 'Owner',
        'status' => 'Status',
        'priority' => 'Priority',
        'estimated_time' => 'Estimated time',
        'work_time' => 'Work time',
        'edit_description' => 'Edit description',
        'files' => 'Files',
        'add' => 'Add issue',
        'deleting' => 'Issue deleting',
        'delete' => 'Delete issue',
        'delete_message' => 'Do you really want to delete this issue?',
        'no_issues' => 'There are no issues',
        'form' => [
            'title' => 'Title of issue',
            'title_placeholder' => 'Enter title of issue',
            'description' => 'Description about issue',
            'description_placeholder' => 'Enter description about issue',
            'estimated_time_placeholder' => 'Format: dd:hh:mm or hh:mm',
            'work_time_placeholder' => 'Format: dd:hh:mm or hh:mm'
        ],
    ],

    'comment' => [
        'title' => 'Comment',
        'add' => 'Add comment',
        'create' => 'Create comment',
        'edit' => 'Edit comment',
        'author' => 'Author',
        'description' => 'Description',
        'text' => 'Comment text',
        'text_placeholder' => 'Enter comment',
        'deleting' => 'Comment deleting',
        'delete' => 'Delete comment',
        'delete_message' => 'Do you really want to delete this comment?',
        'no_comments' => 'There are no comments'
    ]
];