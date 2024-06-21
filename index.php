<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>

<body>
    <?php
    session_start();
    ?>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <div id="wrapper">
        <div class="header">
            <img src="gambar/Jellysyous.png" alt="Header Image">
        </div>
        <div class="navigation">
            <a href="index.php" class="linkcolor2">HOME</a>
            <a href="index.php?halaman=produk" class="linkcolor2">KATEGORI BARANG</a>
            <a href="index.php?halaman=keranjang-belanja" class="linkcolor2">BELANJA</a>
            <a href="tentangkami.html" class="linkcolor2">TENTANG KAMI</a>
        </div>
        <div class="content">
            <div class="leftmenu">
                <div class="searchcontainer">
                    <div class="search">
                        <input type="search" class="inputlength" placeholder="Search...">
                    </div>
                    <div class="button">
                        <button>Cari</button>
                    </div>
                </div>
                <div class="commercial">
                    <a href="" class="ahref"><img src="gambar/iklan.png" alt="Commercial"></a>
                </div>
                <div class="biotoko">
                    <div class="biogambar">
                        <img src="gambar/miegoreng.png" alt="Bio Gambar">
                    </div>
                    <div class="listorder">
                        <a href="" class="linkcolor">Penjual</a>
                        <a href="" class="linkcolor">Lokasi</a>
                        <a href="" class="linkcolor">Buku Tamu</a>
                        <a href="" class="linkcolor">Seller</a>
                        <a href="" class="linkcolor">Input Profile</a>
                    </div>
                </div>
                <div class="belanja">
                    <div class="gambarbelanja">
                        <img src="gambar/nasigoreng.png" alt="Nasi Goreng">
                    </div>
                    <div class="listbelanja">
                        <a href="" class="linkcolor">Nasi Goreng</a>
                        <a href="" class="linkcolor">Mie Goreng</a>
                        <a href="" class="linkcolor">Bakso Iga</a>
                    </div>
                </div>
                <a href="">
                    <div class="testimoni"><img src="gambar/testimoni.png" alt="Testimoni"></div>
                </a>
                <div class="payment">
                    <img src="gambar/logodana.png" alt="DANA">
                    <img src="gambar/logoovo.png" alt="OVO">
                    <img src="gambar/logoqris.png" alt="LINKAJA">
                </div>
                <div class="sosmed">
                    <a href=""><img src="gambar/Facebook_f_logo_(2019).svg.png" alt="Facebook" class="medsos"></a>
                    <a href=""><img src="gambar/Logo_of_Twitter.svg.webp" alt="Twitter" class="medsos"></a>
                    <a href=""><img src="gambar/Instagram_logo_2022.svg.webp" alt="Instagram" class="medsos"></a>
                    <a href=""><img src="gambar/2062095_application_chat_communication_logo_whatsapp_icon.svg.webp"
                            alt="WhatsApp" class="medsos"></a>
                </div>
            </div>
            <div class="maincontent">
                <?php
                if (isset($_GET['halaman'])) {
                    $halaman = htmlspecialchars($_GET['halaman']);
                    switch ($halaman) {
                        case 'produk':
                            include "produk.php";
                            break;
                        case 'keranjang-belanja':
                            include "keranjang-belanja.php";
                            break;
                        default:
                            echo "<center><h3>Maaf. Halaman tidak ditemukan!</h3></center>";
                            break;
                    }
                } else {
                    include "produk.php";
                }
                ?>
            </div>
        </div>
        <div class="footer">
            <p>&copy; 2024 II Z11.2023.00148 II Jerry Kurniawan Piri II JellySyous</p>
        </div>
    </div>
</body>

</html>
