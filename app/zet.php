<?php

/**
 * @
 */

function renderUser(string $user)
{
    if(!$user){
    throw new Exception('404');
}
    echo $user;
}

function testController()
{

    $user1 = '';
    $user2 = 'Petya';

    try {
        renderUser($user1);
    } catch (Exception $e) {
        echo $e->getMessage();
    };

    renderUser($user2);

}

testController();