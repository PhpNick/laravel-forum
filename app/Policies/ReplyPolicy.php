<?php

namespace App\Policies;

use App\Models\Reply;
use App\Models\User;

class ReplyPolicy
{
    /**
     * Определяем, принадлежит ли данное сообщение текущему пользователю
     *
     * @param  User  $user
     * @param  Reply $reply
     * @return bool
     */
    public function update(User $user, Reply $reply)
    {
        return $reply->user_id == $user->id;
    }
}
