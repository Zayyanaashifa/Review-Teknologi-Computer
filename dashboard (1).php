<!DOCTYPE html>
<html lang="en">
<?php 
	session_start();
	if (!isset($_SESSION['username'])) {
		header('location:login.php');
		exit;
	}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styledashboard.css">
    <style>
        /* Tambahan styling inline */
        .home-content {
            display: flex;
            flex-direction: column;
            align-items: flex-start; /* Menjauhkan dari kiri */
            margin-left: 250px; /* Menyesuaikan dengan lebar sidebar */
            padding: 20px; /* Memberi ruang agar tidak terlalu dekat */
        }

        #text {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px; /* Memberi jarak dengan jam digital */
        }

        #date {
            font-size: 18px;
            color: #555; /* Warna lebih soft untuk jam digital */
        }

        @media screen and (max-width: 768px) {
            .home-content {
                margin-left: 0; /* Atur ulang margin di layar kecil */
                padding: 10px;
                align-items: center; /* Pusatkan konten di layar kecil */
                text-align: center;
            }
        }
    </style>
</head>
<body>
    
    <input type="checkbox" id="menu-toggle">
    <label for="menu-toggle" class="menu-icon">&#x22EE;</label>

    <div class="sidebar">
        <h2>Sudut Informasi</h2>
        <ul>
            <li><a href="dashboard.php"><img src="assets\dashboard_1828791.png" alt="Dashboard" class="icon"> Dashboard</a></li>
            <li><a href="kategori.php"><img src="assets\list-items_7427741.png" alt="kategori" class="icon"> Kategori</a></li>
            <li><a href="login-next.php"><img src="assets\home_9046092.png" alt="Home" class="icon"> Home</a></li>
            <li><a href="berita.php"><img src="assets\newspaper_17387065.png" alt="Berita" class="icon"> Berita</a></li>
        </ul>
    </div>

    
    <div class="home-content">
    <h2 id="text">
        Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!
    </h2>
    <h3 id="date"></h3>
    <a href="logout.php" class="logout-button">Logout</a> <!-- Tombol Logout -->
</div>

<style>
    .logout-button {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        font-size: 16px;
        background-color: #ff4d4d;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .logout-button:hover {
        background-color: #ff1a1a;
    }
</style>


    <script>
        function updateDateTime() {
            const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
            const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

            let now = new Date();
            let day = days[now.getDay()];
            let date = now.getDate();
            let month = months[now.getMonth()];
            let year = now.getFullYear();
            let hours = now.getHours();
            let minutes = now.getMinutes();
            let seconds = now.getSeconds();

            // Tambahkan angka nol jika nilai kurang dari 10
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            // Format waktu dan tanggal
            let formattedDate = `${day}, ${date} ${month} ${year}`;
            let formattedTime = `${hours}:${minutes}:${seconds}`;

            // Perbarui elemen HTML
            document.getElementById("date").innerText = `${formattedDate}, ${formattedTime}`;
        }

        // Jalankan fungsi setiap detik
        setInterval(updateDateTime, 1000);

        // Jalankan fungsi segera saat halaman dimuat
        updateDateTime();
    </script>


</body>
</html>
