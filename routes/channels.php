<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

//presence channels, bc events and users inside
Broadcast::channel('App.Post.{id}', function ($user, $id) {
    //return (int)$user->id === (int)$id;
    return [
        'id' => $user->id,
        'name' => $user->name
    ];
});
