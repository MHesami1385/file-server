<?php

use Core\Session;

?>
<!doctype html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?= $heading ?></title>
</head>
<body class="h-full">

<div class="min-h-full">
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <img class="size-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500"
                             alt="Your Company">
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="/users/manage"
                               class="rounded-md px-3 py-2 text-sm font-medium <?= urlIs('/users/manage') ? "text-white bg-gray-900\" aria-current=\"page" : 'text-gray-300 hover:bg-gray-700' ?>text-gray-300 hover:bg-gray-700 hover:text-white">Manage
                                Users</a>
                            <a href="/change-pass"
                               class="rounded-md px-3 py-2 text-sm font-medium text-yellow-500 <?= urlIs('/change-pass') ? "bg-gray-900\" aria-current=\"page" : 'hover:bg-gray-700' ?>">Change
                                Administrator Password</a>
                            <form action="/login" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="rounded-md px-3 py-2 text-sm font-medium text-red-500 hover:bg-gray-700">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button type="button"
                            class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!-- Menu open: "hidden", Menu closed: "block" -->
                        <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                        </svg>
                        <!-- Menu open: "block", Menu closed: "hidden" -->
                        <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="/users/manage"
                   class="block rounded-md px-3 py-2 text-base font-medium <?= urlIs('/users/manage') ? "text-white bg-gray-900\" aria-current=\"page" : 'text-gray-300 hover:bg-gray-700' ?>">Manage
                    Users</a>
                <a href="/change-pass"
                   class="block rounded-md px-3 py-2 text-base font-medium text-yellow-500 <?= urlIs('/change-pass') ? "bg-gray-900\" aria-current=\"page" : 'hover:bg-gray-700' ?>">Change
                    Administrator Password</a>
                <form action="/login" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="rounded-md px-3 py-2 text-sm font-medium text-red-500 hover:bg-gray-700">Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900"><?= $heading . ((!(urlIs('/users/create') || urlIs('/change-pass')) && Session::get('message')) ? " - " . Session::get('message') : "") ?></h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">