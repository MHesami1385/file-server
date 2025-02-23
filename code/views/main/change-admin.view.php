<?php require base_path("views/partials/header.php"); ?>

<div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" method="POST" action="/change-pass">
        <input type="hidden" name="_method" value="PATCH">
        <div>
            <label for="password" class="block text-sm/6 font-medium text-gray-900">New Password</label>
            <div class="mt-2">
                <input type="password" name="password" id="password"
                       class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
        </div>

        <div>
            <div class="flex items-center justify-between">
                <label for="repassword" class="block text-sm/6 font-medium text-gray-900">Repeat Password</label>
            </div>
            <div class="mt-2">
                <input type="password" name="repassword" id="repassword" autocomplete="current-password"
                       class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
        </div>

        <div>
            <button type="submit"
                    class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Change
            </button>
        </div>
    </form>


    <p class="mt-10 text-center text-sm/6 text-red-500"><?= $message ?></p>
