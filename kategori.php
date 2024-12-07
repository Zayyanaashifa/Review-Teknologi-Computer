<?php
// Koneksi ke database
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'sudut_informasi'; // Ganti dengan nama database Anda
$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die('Koneksi gagal: ' . mysqli_connect_error());
}

// Handle Create (Tambah Data)
if (isset($_POST['create'])) {
    $id_user = $_POST['id_user'];
    $jenis_produk = $_POST['jenis_produk'];
    $harga = $_POST['harga'];

    // Proses upload gambar
    $target_dir = "img_categories/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

    // Simpan ke database
    $query = "INSERT INTO tb_categories (id_user, jenis_produk, harga, gambar) 
              VALUES ('$id_user', '$jenis_produk', '$harga', '$target_file')";
    if (mysqli_query($conn, $query)) {
        header("Location: kategori.php");
    } else {
        die("Error: " . mysqli_error($conn));
    }
}

// Handle Update (Ubah Data)
if (isset($_POST['update'])) {
    $id_kategori = $_POST['id_kategori'];
    $id_user = $_POST['id_user'];
    $jenis_produk = $_POST['jenis_produk'];
    $harga = $_POST['harga'];

    // Proses upload gambar baru (jika ada)
    if ($_FILES["gambar"]["name"] != "") {
        $target_dir = "img_categories/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

        // Update dengan gambar baru
        $query = "UPDATE tb_categories SET 
                  id_user='$id_user', 
                  jenis_produk='$jenis_produk', 
                  harga='$harga', 
                  gambar='$target_file' 
                  WHERE id_kategori='$id_kategori'";
    } else {
        // Update tanpa mengganti gambar
        $query = "UPDATE tb_categories SET 
                  id_user='$id_user', 
                  jenis_produk='$jenis_produk', 
                  harga='$harga' 
                  WHERE id_kategori='$id_kategori'";
    }

    if (mysqli_query($conn, $query)) {
        header("Location: kategori.php");
    } else {
        die("Error: " . mysqli_error($conn));
    }
}

// Handle Delete (Hapus Data)
if (isset($_GET['delete'])) {
    $id_kategori = $_GET['delete'];

    $query = "DELETE FROM tb_categories WHERE id_kategori='$id_kategori'";
    if (mysqli_query($conn, $query)) {
        header("Location: kategori.php");
    } else {
        die("Error: " . mysqli_error($conn));
    }
}

// Fetch data untuk Read (Baca Data)
$query = "SELECT * FROM tb_categories";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="style_kategori.css">
</head>
<body>
<div class="sidebar">
    <h2>Sudut Informasi</h2>
    <ul>
        <li><a href="dashboard.php"><img src="assets/dashboard_1828791.png" alt="Dashboard" class="icon"> Dashboard</a></li>
        <li><a href="kategori.php"><img src="assets/list-items_7427741.png" alt="kategori" class="icon"> Kategori</a></li>
        <li><a href="login-next.php"><img src="assets/home_9046092.png" alt="Home" class="icon"> Home</a></li>
        <li><a href="berita.php"><img src="assets/newspaper_17387065.png" alt="Berita" class="icon"> Berita</a></li>
    </ul>
</div>
<div class="content">
    <h1>Kategori</h1>

    <!-- Form Tambah / Update -->
    <form action="" method="post" enctype="multipart/form-data" class="form">
        <input type="hidden" name="id_kategori" value="<?= isset($_GET['edit']) ? $_GET['edit'] : '' ?>">
        
        <label>ID User:</label>
        <input type="text" name="id_user" required value="<?= isset($_GET['id_user']) ? $_GET['id_user'] : '' ?>"><br>
    
        <label>Jenis Produk:</label>
        <input type="text" name="jenis_produk" required value="<?= isset($_GET['jenis_produk']) ? $_GET['jenis_produk'] : '' ?>"><br>
    
        <label>Harga:</label>
        <input type="number" name="harga" required value="<?= isset($_GET['harga']) ? $_GET['harga'] : '' ?>"><br>
    
        <label>Gambar:</label>
        <input type="file" name="gambar"><br>
        
        <?php if (isset($_GET['edit'])): ?>
            <button type="submit" name="update">Update</button>
        <?php else: ?>
            <button type="submit" name="create">Tambah</button>
        <?php endif; ?>
    </form>

    <!-- Tabel Data -->
    <h2>Daftar Kategori</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID Kategori</th>
            <th>ID User</th>
            <th>Jenis Produk</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row['id_kategori'] ?></td>
                <td><?= $row['id_user'] ?></td>
                <td><?= $row['jenis_produk'] ?></td>
                <td><?= $row['harga'] ?></td>
                <td><img src="<?= $row['gambar'] ?>" alt="Gambar Produk" width="100"></td>
                <td>
                    <a href="?edit=<?= $row['id_kategori'] ?>&id_user=<?= $row['id_user'] ?>&jenis_produk=<?= $row['jenis_produk'] ?>&harga=<?= $row['harga'] ?>&gambar=<?= $row['gambar'] ?>">Edit</a> |
                    <a href="?delete=<?= $row['id_kategori'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>
