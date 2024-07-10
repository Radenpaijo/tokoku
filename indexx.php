<?php 
session_start();
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "tokoku");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Toko Hoodie</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <style>
        .produk img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .produk .card-body {
            padding: 15px;
        }
        .produk .card-title {
            font-size: 18px;
            font-weight: bold;
        }
        .produk .card-text {
            font-size: 16px;
            color: #888;
        }
    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="keranjang.php">Keranjang</a></li>
        <li class="nav-item"><a class="nav-link" href="koleksi.php">Koleksi</a></li>
        <li class="nav-item"><a class="nav-link" href="checkout.php">Checkout</a></li>
    </ul>
  </div>
</nav>

<!-- Konten -->
<section class="konten my-5">
  <div class="container">
    <h1 class="mb-4">Produk Terbaru</h1>
    <div class="row g-4">
      <!-- Mengambil data produk dari database -->
      <?php 
      $ambil = $koneksi->query("SELECT * FROM produk");
      while($perproduk = $ambil->fetch_assoc()){ ?>
        <div class="col-md-3 produk">
          <div class="card h-100">
            <img src="foto_produk/<?php echo $perproduk['foto_produk'];?>" alt="<?php echo $perproduk['nama_produk']; ?>" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title"><?php echo $perproduk['nama_produk'];?></h5>
              <p class="card-text">Rp. <?php echo number_format($perproduk['harga_produk']);?></p>
              <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">BELI!!!</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>


</body>
</html>
