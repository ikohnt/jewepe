<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div>
    <h2 class="text-2xl font-bold text-slate-900">Kelola Status Pesanan Masuk</h2>
    <p class="text-xs text-slate-500 mt-1">
        Ubah status pesanan dari <strong>Request</strong> menjadi <strong>Approved</strong>, lalu kirimkan
        balasan konfirmasi secara manual ke email pemesan.
    </p>
</div>

<div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm mt-6">
    <table class="w-full text-left border-collapse text-xs">
        <thead>
            <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 uppercase font-semibold tracking-wider">
                <th class="p-4">ID Order</th>
                <th class="p-4">Nama Pemesan</th>
                <th class="p-4">Email Identitas</th>
                <th class="p-4">Paket Wedding</th>
                <th class="p-4">Tgl Acara</th>
                <th class="p-4">Status</th>
                <th class="p-4 text-center">Aksi Admin</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 text-slate-700">
            <?php if (empty($pesanan)): ?>
            <tr><td colspan="7" class="p-6 text-center text-slate-400">Belum ada pesanan masuk.</td></tr>
            <?php else: foreach ($pesanan as $row): ?>
            <tr>
                <td class="p-4 font-semibold">#<?= $row->id ?></td>
                <td class="p-4"><?= html_escape($row->nama_pemesan) ?></td>
                <td class="p-4"><?= html_escape($row->email) ?></td>
                <td class="p-4"><?= html_escape($row->nama_paket) ?></td>
                <td class="p-4"><?= date('d M Y', strtotime($row->tanggal_acara)) ?></td>
                <td class="p-4">
                    <?php if ($row->status === 'approved'): ?>
                        <span class="px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-700 font-bold">Approved</span>
                    <?php else: ?>
                        <span class="px-2.5 py-1 rounded-full bg-amber-100 text-amber-700 font-bold">Request</span>
                    <?php endif; ?>
                </td>
                <td class="p-4 text-center">
                    <?php if ($row->status === 'request'): ?>
                        <a href="<?= site_url('admin/pesanan/approve/' . $row->id) ?>" class="px-3 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-bold">Approve</a>
                    <?php else: ?>
                        <a href="<?= site_url('admin/pesanan/batalkan/' . $row->id) ?>" class="px-3 py-1.5 rounded-lg bg-slate-500 hover:bg-slate-600 text-white font-bold">Batalkan</a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; endif; ?>
        </tbody>
    </table>
</div>
