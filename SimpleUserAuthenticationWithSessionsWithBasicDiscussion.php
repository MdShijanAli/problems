<?php
session_start([
    'cookie_lifetime' => 300,
]);

if (isset($_POST['username']) && isset($_POST['password'])) {
    if ('admin' == $_POST['username'] && 'Ur@li@r1%' == $_POST['password']) {
        $_SESSION['loggedin'] = true;
    } else {
        $_SESSION['loggedin'] = false;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>




    <div class="flex flex-col items-center justify-center min-h-screen py-6 bg-gray-50">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-md w-full">
            <div>
                <?php
                if (true == $_SESSION['loggedin']) {
                    echo "Hello Admin, Welcome!";
                } else {
                    echo "Hello Jesmin, Login Koro age";
                }
                ?>
            </div>
            <h2 class="text-2xl font-bold mb-6">Sign In</h2>
            <?php
            if (false == $_SESSION['loggedin']) :
            ?>
                <form class="space-y-6" method="POST">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2" for="username">
                            Username
                        </label>
                        <input id="username" name="username" type="text" class="border border-gray-400 py-2 px-3 w-full rounded-lg focus:outline-none focus:border-blue-400" required />
                    </div>
                    <div class="relative">
                        <label class="block text-gray-700 font-semibold mb-2" for="password">
                            Password
                        </label>
                        <input id="password" name="password" type="password" class="border border-gray-400 py-2 px-3 w-full rounded-lg focus:outline-none focus:border-blue-400 pr-10" required />
                        <button type="button" class="absolute top-0 right-0 h-full px-3 py-2" onclick="togglePassword()">
                            <svg class="h-10 w-10 mt-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.5 10a2.5 2.5 0 015 0v.01" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex items-center justify-between">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-400" />
                            <span class="ml-2 text-gray-700 font-semibold">Remember me</span>
                        </label>
                        <a class="text-blue-400 hover:underline" href="#">Forgot Password?</a>
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-400 hover:bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg w-full focus:outline-none focus:shadow-outline-blue">
                            Sign In
                        </button>
                    </div>
                </form>
            <?php
            else :
            ?>
                <form action="auth.php?logout=true" method="POST">
                    <button type="submit" class="bg-primary">Logout</button>
                </form>
            <?php
            endif;
            ?>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>


</body>

</html>