<?php

return [
    'ROLE' => [
        'ADMIN' => 0,
        'USER' => 1,
        'GUEST' => 2,
    ],
    'ROLE_NAME' => [
        0 => 'ADMIN',
        1 => 'USER',
        2 => 'GUEST',
    ],
    'SHOWTIME_STATUS' => [
        'NOW_SHOWING' => 0,
        'UPCOMING' => 1,
        'CANCELLED' => 2,
    ],
    'SHOWTIME_STATUS_NAME' => [
        0 => 'NOW SHOWING',
        1 => 'UPCOMING',
        2 => 'CANCELLED',
    ],
    'REGEX_PATTERN' => [
        'URL' => '/https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&\/\/=]*)/'
    ],
    'AUTH_MESSAGE' => [
        'SUCCESSFUL' => 'SUCCESSFUL',
        'FAILED' => 'FAILED',
        'LOGIN_FAIL' => 'LOGIN_FAIL',
        'INCORRECT_PASSWORD' => 'OLD PASSWORD IS INCORRECT',
        'TOKEN_INVALID' => 'TOKEN INVALID', 
        'TOKEN_EXPIRED' => 'TOKEN EXPIRED',
        'NO_RESOURCE_FOUND' => 'NO_RESOURCE_FOUND',
        'LOGIN_SUCCESSFUL' => 'LOGIN_SUCCESSFUL',
        'ACCOUNT_ALREADY_EXIST' => 'ACCOUNT ALREADY EXIST',
        'REGISTER_SUCCESSFUL' => 'REGISTER SUCCESSFUL',
        'AN_ERROR_OCCURRED_WHILE_LOGIN' => 'AN ERROR OCCURRED WHILE LOGIN',
        'EMAIL_OR_PASSWORD_IS_INVALID' => 'EMAIL OR PASSWORD IS INVALID',
        'AN_ERROR_OCCURRED_WHILE_REGISTER' => 'AN ERROR OCCURRED WHILE REGISTER',
    ],
];