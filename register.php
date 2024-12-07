<!DOCTYPE html>
<html lang="en">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<pre>";
    print_r($_POST); // Melihat data yang dikirim
    echo "</pre>";
    exit; // Hentikan eksekusi sementara untuk debugging
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main>
        <section id="login" class="section">
            <form id="loginForm" onsubmit="saveToCookie()"  method="POST" action="register-proses.php">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    
    <button type="submit">Register</button>
</form>

            </form>
        </section>
    </main>

    <script>
        // Fungsi untuk set Cookie
        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + encodeURIComponent(cvalue) + ";" + expires + ";path=/";
        }

        // Fungsi untuk menyimpan data form ke Cookie
        function saveToCookie() {
            var email = document.getElementById('Email').value;
            var username = document.getElementById('username').value;

            // Simpan data ke Cookie
            setCookie('email', email, 30); // Cookie berlaku selama 30 hari
            setCookie('username', username, 30);
        }
    </script>
</body>
</html>
