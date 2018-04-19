<?php

declare(strict_types=1);

define('TOKEN_API', '432585264:AAH_6U4kCYdY-dcbcXz04TxVh80j-IgkQQo');

define('TELEGRAM_API_PATH', 'https://api.telegram.org/bot' . TOKEN_API);

define('GET_UPDATES_METHOD', TELEGRAM_API_PATH . '/getUpdates');

define('PING', TELEGRAM_API_PATH . '/getMe');

define('HTTPS_PROXY', '45.76.146.253:8888');

