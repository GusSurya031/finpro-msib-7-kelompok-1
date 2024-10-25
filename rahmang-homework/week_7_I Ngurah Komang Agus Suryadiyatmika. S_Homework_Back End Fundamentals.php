<?php

// Judul Sistem 
echo "=========================================\n";
echo "|   Sistem Pemesanan Tiket Sederhana    |\n";
echo "=========================================\n";

// Pilihan Tiket
echo "Pilihan tiket yang tersedia: \n1. Tiket Dewasa: Rp 50.000 \n2. Tiket Anak-Anak: Rp 30.000 \n";
echo "-----------------------------------------\n";
echo "Note:\n*input yang diterima berupa angka,\nselain angka maka input ulang \n";
echo "-----------------------------------------\n";
do {
    $jenis_tiket = readline("Tiket yang dipilih               : ");
} while (!is_numeric($jenis_tiket) || $jenis_tiket > 2);

// Jumlah Tiket
do {
    $jumlah_tiket = readline("Jumlah tiket yang dibeli         : ");
} while (!is_numeric($jumlah_tiket));
echo "-----------------------------------------\n";

// Hari Pemesanann
echo "Pilihan hari: \n1. Senin \n2. Selasa \n3. Rabu \n4. Kamis \n5. Jumat \n6. Sabtu \n7. Minggu \n";
echo "-----------------------------------------\n";
do {
    $pilihan_hari = readline("Hari pemesanan                  : ");
} while (!is_numeric($pilihan_hari) || $pilihan_hari > 7);


// ---------- Kalkulasi harga ----------------
// perhitungan jumlah tiket
$harga_tiket = ($jenis_tiket == 1) ? 50000 : 30000;  // jika jenis tiket 1 (dewasa), maka harga tiket Rp 50.000, jika tidak maka Rp 30.000     
$jumlah_tiket = intval($jumlah_tiket); // konversi string menjadi integer (karena setiap input, typenya string)
$total_harga_tiket = $harga_tiket * $jumlah_tiket;

// Tambahan biaya weekend 
$tambahan_biaya_weekend = ($pilihan_hari == 6 || $pilihan_hari == 7) ? 10000 : 0; // jika pilihan hari 6 (sabtu) atau 7 (minggu), tamabahan biaya 10.000 / tiket
$total_tambahan_biaya = $jumlah_tiket * $tambahan_biaya_weekend;

// Total sementara
$total_biaya_sementara = $total_harga_tiket + $total_tambahan_biaya;

// diskon 
$diskon = ($total_biaya_sementara > 150000) ? 0.1 : 0; // jika total harga tiket lebih dari 150.000, maka dapat diskon 10% (0.1)
$potongan_harga = $total_biaya_sementara * $diskon;

// total harga 
$total_biaya = $total_biaya_sementara - $potongan_harga;

$hari = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];

// ---------- Output ----------------
echo "-----------------------------------------\n";
echo "Rincian transaksi anda     :\n ";
if ($jenis_tiket == 1) {
    echo "     Tiket Dewasa\n";
    echo "      " . $jumlah_tiket . " " . "x Rp 50.000\n";
} else {
    echo "     Tiket Anak-anak\n";
    echo "      " . $jumlah_tiket . " " . "x Rp 30.000\n";
}
echo "Total Harga                : Rp " . $total_harga_tiket;
echo "\nHari Pemesanan             : " . $hari[(intval($pilihan_hari) - 1)];
echo "\nTambahan Biaya (Weekend)   : Rp " . $total_tambahan_biaya;
echo "\nDiskon                     : Rp " . $potongan_harga;
echo "\n-----------------------------------------";
echo "\n               TOTAL BIAYA : Rp " . $total_biaya;
