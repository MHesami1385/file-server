<?php require base_path("views/partials/header.php");
if ($noUser) : //except admin
    ?>
    <div class="text-center mt-10 mb-5">
        <p class="text-lg font-semibold text-gray-600">"No users found."</p>
        <p class="mt-2 text-gray-500">It looks like there are no users in the system. You can add new users to get
            started.</p>
    </div>
<?php endif; ?>
<div class="flex justify-center items-center mb-6">
    <a href="/users/create" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
        Add a User
    </a>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 ">
    <?php foreach ($users as $user):
        if ($user['username'] !== "Administrator"):?>
            <div class="bg-white rounded-lg shadow-md p-6">
                <p class="text-gray-600 text-lg font-medium mb-2">
                    <span class="font-bold text-gray-800">Username:</span> <?= htmlspecialchars($user['username']) ?>
                </p>
                <p class="text-gray-600 text-lg font-medium mb-4">
                    <span class="font-bold text-gray-800">Full Name:</span> <?= htmlspecialchars($user['fullname']) ?>
                </p>
                <div class="flex space-x-4">
                    <!-- Delete User Form -->
                    <form method="POST" class="inline" action="/users/manage">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="username" value="<?= htmlspecialchars($user['username']) ?>">
                        <button type="submit"
                                class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                            Delete User
                        </button>
                    </form>
                    <!-- Reset Password Form -->
                    <form method="POST" class="inline">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="username" value="<?= htmlspecialchars($user['username']) ?>">
                        <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                            Reset Password
                        </button>
                    </form>
                </div>
            </div>
        <?php
        endif;
    endforeach;
    ?>

</div>


<?php require base_path("views/partials/footer.php"); ?>







