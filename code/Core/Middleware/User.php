<?php

namespace Core\Middleware;
class User
{
    public function handle()
    {
        if (($_SESSION['username'] ?? false) === "Administrator") {
            redirect("/");
        }
    }
}