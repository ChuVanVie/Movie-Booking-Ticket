<?php

return [
    'ROLE' => [
        'ADMIN' => 0,
        'USER' => 1,
        'GUEST' => 2,
    ],
    'ROLE_NAME' => [
        0 => 'Admin',
        1 => 'User',
        2 => 'Guest',
    ],
    'SHOWTIME_STATUS' => [
        'NOW_SHOWING' => 0,
        'UPCOMING' => 1,
        'CANCELLED' => 2,
    ],
    'SHOWTIME_STATUS_NAME' => [
        0 => 'Now Showing',
        1 => 'Upcoming',
        2 => 'Cancelled',
    ],
    'THEATER_STATUS' => [
        'AVAILABLE' => 0,
        'IN_USE' => 1,
    ],
    'THEATER_STATUS_NAME' => [
        0 => 'Available',
        1 => 'In Use',
    ],
    'SEAT_STATUS' => [
        'AVAILABLE' => 0,
        'UNAVAILABLE' => 1,
        'RESERVED' => 2,
    ],
    'SEAT_STATUS_NAME' => [
        0 => 'Available',
        1 => 'Unavailable',
        2 => 'Reserved',
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