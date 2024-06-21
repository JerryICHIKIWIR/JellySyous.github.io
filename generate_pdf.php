<?php
session_start();
require_once('tcpdf/tcpdf.php');

// Check if cart is not empty
if (empty($_SESSION['keranjang_belanja'])) {
    die("Cart is empty");
}

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Keranjang Belanja');
$pdf->SetSubject('Shopping Cart');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// Set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// Set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Add a page
$pdf->AddPage();

// Set some content to print
$html = '<h2>Nota Belanja</h2>
<table border="1" cellpadding="4">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>QTY</th>
            <th>Sub Total</th>
        </tr>
    </thead>
    <tbody>';

$no = 0;
$total = 0;
foreach ($_SESSION['keranjang_belanja'] as $item) {
    $no++;
    $sub_total = $item['jumlah'] * $item['harga'];
    $total += $sub_total;
    $html .= '<tr>
        <td>' . $no . '</td>
        <td>' . $item['kode_produk'] . '</td>
        <td>' . $item['nama_produk'] . '</td>
        <td>Rp. ' . number_format($item['harga'], 0, ',', '.') . '</td>
        <td>' . $item['jumlah'] . '</td>
        <td>Rp. ' . number_format($sub_total, 0, ',', '.') . '</td>
    </tr>';
}

$html .= '</tbody></table>';
$html .= '<h3>Total Pembayaran Rp. ' . number_format($total, 0, ',', '.') . '</h3>';

// Print text using writeHTMLCell()
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('keranjang_belanja.pdf', 'I');

?>
