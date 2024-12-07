<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        #toast {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 4px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 17px;
        }

        #toast.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 30px; opacity: 1;}
        }

        @keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 30px; opacity: 1;}
        }

        @-webkit-keyframes fadeout {
            from {bottom: 30px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }

        @keyframes fadeout {
            from {bottom: 30px; opacity: 1;}
            to {bottom: 0; opacity: 0;}
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Review Teknologi Komputer</h1>
            <nav>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="login-next.php">Beranda</a></li>
                    <li><a href="review.php">Review Produk</a></li>
                    <li><a href="rekomendasi.php">Rekomendasi</a></li>
                    <li><a href="login.php">Log-In</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section id="news" class="section">
            <h2>Berita Teknologi Terbaru</h2>
            <article class="news-item">
                <h3>Intel Meluncurkan Prosesor Generasi Ke-14</h3>
                <p>Intel resmi merilis prosesor generasi terbaru dengan peningkatan performa signifikan untuk gaming dan produktivitas.</p>
                <a href="#">Baca selengkapnya</a>
            </article>
        </section>
    </main>

    <div id="toast"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const newsLink = document.querySelector('.news-item a');

            newsLink.addEventListener('click', function(event) {
                event.preventDefault();
                showToast('Baca selengkapnya belum diupdate!');
            });
        });

        function showToast(message) {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.className = "show";
            setTimeout(function() {
                toast.className = toast.className.replace("show", "");
            }, 3000);
        }
    </script>
</body>
</html>
