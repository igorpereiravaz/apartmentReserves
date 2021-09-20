<?php

namespace App\Util;

class Notification
{

    /**
     *
     * @param int $status Type of notification (see above comments).
     * @return string $message Message that will be shown.
     */
    public static function setNotification($message = null)
    {
        Session()->put('notificationMessage', $message);
    }
}
