<?php

if ($_SESSION['username'] ?? false) {

    if ($_SESSION['username'] === "Administrator") {
        redirect("/users/manage");
    } else {
        redirect("/change-pass");
    }
} else {
    redirect("/login");
}



