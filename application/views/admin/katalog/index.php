<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="flex flex-wrap items-center justify-between gap-4">
    <div>
        <h2 class="text-2xl font-bold text-slate-900">Manajemen Katalog Paket</h2>
        <p class="text-xs text-slate-500 mt-1">Daftar paket pernikahan yang dipublikasikan ke pemesan online.</p>
    </div>
    <a href="<?= site_url('admin/katalog/tambah') ?>" class="px-4 py-2.5 bg-gold-600 hover:bg-gold-700 text-white rounded-xl text-xs font-bold shadow flex items-center gap-2">
        <i class="fa-solid fa-plus"></i> Tambah Paket Baru
    </a>
</div>

<div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm mt-6">
    <table class="w-full text-left border-collapse text-xs">
        <thead>
            <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 uppercase font-semibold tracking-wider">
                <th class="p-4">No</th>
                <th class="p-4">Gambar</th>
                <th class="p-4">Nama Paket</th>
                <th class="p-4">Harga (Rp)</th>
                <th class="p-4">Status</th>
                <th class="p-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 text-slate-700">
            <?php if (empty($katalog)): ?>
            <tr><td colspan="6" class="p-6 text-center text-slate-400">Belum ada data katalog.</td></tr>
            <?php else: $no = 1; foreach ($katalog as $row): ?>
            <tr>
                <td class="p-4"><?= $no++ ?></td>
                <td class="p-4"><img src="<?= base_url('uploads/katalog/' . $row->gambar) ?>" class="w-14 h-14 object-cover rounded-lg"></td>
                <td class="p-4 font-semibold text-slate-900"><?= html_escape($row->nama_paket) ?></td>
                <td class="p-4"><?= number_format($row->harga, 0, ',', '.') ?></td>
                <td class="p-4">
                    <?php if ($row->status === 'publish'): ?>
                        <span class="px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-700 font-bold">Publish</span>
                    <?php else: ?>
                        <span class="px-2.5 py-1 rounded-full bg-slate-200 text-slate-600 font-bold">Draft</span>
                    <?php endif; ?>
                </td>
                <td class="p-4">
                    <div class="flex items-center justify-center gap-2">
                        <a href="<?= site_url('admin/katalog/edit/' . $row->id) ?>" class="px-3 py-1.5 rounded-lg bg-slate-900 hover:bg-slate-800 text-white font-bold">Edit</a>
                        <a href="<?= site_url('admin/katalog/hapus/' . $row->id) ?>" onclick="return confirm('Hapus paket ini?');" class="px-3 py-1.5 rounded-lg bg-rose-600 hover:bg-rose-700 text-white font-bold">Hapus</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>
