<?php

namespace Core\Middleware;
class Guest
{
    public function handle()
    {
        if (($_SESSION['username'] ?? false)) {
            redirect("/");
        }
    }
}