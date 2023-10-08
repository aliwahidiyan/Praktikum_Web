<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $nama = $_POST["nama"];
    $nama_dessert = $_POST["nama_dessert"];
    $no_hp = $_POST["no_hp"];
    $tanggal_pesan = $_POST["tanggal_pesan"];

    // Lakukan validasi data jika diperlukan
    // Contoh validasi sederhana untuk nomor handphone (minimal 12 digit)
    if (strlen($no_hp) < 12) {
        echo "Nomor Handphone harus memiliki minimal 10 digit.";
    } else {
       
        // Contoh: Menampilkan data yang telah diinputkan
        echo "Terima kasih Kak $nama! Kakak telah memesan pada tanggal $tanggal_pesan. Kami akan menghubungi Kakak di nomor $no_hp";
        echo ",Mohon Di Tunggu Ya Kak !";
    }
}
?>
