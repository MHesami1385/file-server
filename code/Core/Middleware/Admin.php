<?php

namespace Core\Middleware;
class Admin
{
    public function handle()
    {
        if (($_SESSION['username'] ?? false) !== "Administrator") {
            redirect("/");
        }
    }
}