<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Review Teknologi Komputer</h1>
            <nav>
                <ul>
                    <li><a href="index (1).php">Beranda</a></li>              
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section id="login" class="section">
            <h2>Log-In ke Akun Anda</h2>
            <form action="login-proses.php" method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    
    <button type="submit" class="btn login-btn">Login</button>
</form>
        </section>
    </main>
</body>
</html>