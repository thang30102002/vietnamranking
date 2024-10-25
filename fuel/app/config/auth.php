<?php

return [
    'driver' => 'OrmAuth', // Sử dụng OrmAuth
    'hash' => [
        'driver' => 'bcrypt',
        'cost' => 10,
    ],
];
