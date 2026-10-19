<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Cetak Laporan Pesanan - WO JeWePe</title>
<style>
    body { font-family: Arial, sans-serif; font-size: 12px; color: #1e293b; padding: 30px; }
    h2 { text-align: center; margin-bottom: 2px; }
    p.sub { text-align: center; color: #64748b; margin-top: 0; margin-bottom: 20px; }
    table { width: 100%; border-collapse: collapse; }
    th, td { border: 1px solid #cbd5e1; padding: 6px 8px; text-align: left; }
    th { background: #f1f5f9; }
</style>
</head>
<body onload="window.print()">
    <h2>REKAPITULASI PESANAN PAKET WEDDING JEWEPE</h2>
    <p class="sub">Dicetak otomatis dari Database Sistem Informasi WO JeWePe &mdash; <?= date('d M Y H:i') ?></p>
    <table>
        <thead>
            <tr>
                <th>No</th><th>ID Order</th><th>Nama Pemesan</th><th>Email</th><th>Paket</th><th>Tanggal Acara</th><th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($pesanan)): ?>
            <tr><td colspan="7" style="text-align:center;">Belum ada data.</td></tr>
            <?php else: $no = 1; foreach ($pesanan as $row): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td>#<?= $row->id ?></td>
                <td><?= html_escape($row->nama_pemesan) ?></td>
                <td><?= html_escape($row->email) ?></td>
                <td><?= html_escape($row->nama_paket) ?></td>
                <td><?= date('d M Y', strtotime($row->tanggal_acara)) ?></td>
                <td><?= ucfirst($row->status) ?></td>
            </tr>
            <?php endforeach; endif; ?>
        </tbody>
    </table>
</body>
</html>
