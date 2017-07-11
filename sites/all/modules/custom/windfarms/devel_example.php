<?php

/* 
 *Implements hook_init().
 * 
 * Runs on every page.
 */
function devel_example_init() {
    global $user;
    debug($user);
}
