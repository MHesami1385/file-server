<?php

use Core\DatabaseActions\Authenticator;

(new Authenticator)->logout();

redirect("/");