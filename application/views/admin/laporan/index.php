<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="flex flex-wrap items-center justify-between gap-4">
    <div>
        <h2 class="text-2xl font-bold text-slate-900">Laporan Rekapitulasi Pesanan Paket</h2>
        <p class="text-xs text-slate-500 mt-1">Rekap seluruh pesanan paket katalog untuk dokumentasi admin.</p>
    </div>
    <a href="<?= site_url('admin/laporan/cetak') ?>" target="_blank" class="px-4 py-2.5 bg-slate-900 hover:bg-slate-800 text-white rounded-xl text-xs font-bold shadow flex items-center gap-2">
        <i class="fa-solid fa-print"></i> Cetak Dokumen Laporan
    </a>
</div>

<div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm mt-6">
    <table class="w-full text-left border border-slate-200 text-xs">
        <thead>
            <tr class="bg-slate-100 border-b border-slate-200 font-bold text-slate-700">
                <th class="p-2 border-r">No</th>
                <th class="p-2 border-r">ID Order</th>
                <th class="p-2 border-r">Nama Pemesan</th>
                <th class="p-2 border-r">Email Pemesan</th>
                <th class="p-2 border-r">Paket Dipilih</th>
                <th class="p-2 border-r">Tanggal Acara</th>
                <th class="p-2">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200">
            <?php if (empty($pesanan)): ?>
            <tr><td colspan="7" class="p-4 text-center text-slate-400">Belum ada data pesanan.</td></tr>
            <?php else: $no = 1; foreach ($pesanan as $row): ?>
            <tr>
                <td class="p-2 border-r"><?= $no++ ?></td>
                <td class="p-2 border-r">#<?= $row->id ?></td>
                <td class="p-2 border-r"><?= html_escape($row->nama_pemesan) ?></td>
                <td class="p-2 border-r"><?= html_escape($row->email) ?></td>
                <td class="p-2 border-r"><?= html_escape($row->nama_paket) ?></td>
                <td class="p-2 border-r"><?= date('d M Y', strtotime($row->tanggal_acara)) ?></td>
                <td class="p-2"><?= ucfirst($row->status) ?></td>
            </tr>
            <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>
