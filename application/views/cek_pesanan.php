<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<section class="py-16">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <span class="text-xs font-bold uppercase tracking-widest text-gold-600">Reservasi Online</span>
            <h1 class="text-3xl font-serif font-bold text-slate-900 mt-1">Cek Status Pesanan</h1>
            <p class="text-xs text-slate-500 mt-2">Masukkan alamat email yang Anda gunakan saat memesan untuk melihat status terbaru.</p>
        </div>

        <?= form_open('cek-pesanan', array('class' => 'flex flex-col sm:flex-row gap-3 mb-10')) ?>
            <input type="email" name="email" required value="<?= isset($email) ? html_escape($email) : '' ?>" placeholder="nama@email.com" class="flex-1 px-4 py-3 bg-white border border-stone-300 rounded-xl text-sm focus:ring-2 focus:ring-gold-500 outline-none">
            <button type="submit" class="px-6 py-3 rounded-xl bg-gold-600 hover:bg-gold-700 text-white text-sm font-bold shadow transition">
                <i class="fa-solid fa-magnifying-glass mr-1"></i> Cek Pesanan
            </button>
        <?= form_close() ?>

        <?php if (isset($email) && $email): ?>
            <?php if (empty($hasil)): ?>
                <p class="text-center text-sm text-slate-400">Tidak ditemukan pesanan dengan email tersebut.</p>
            <?php else: ?>
            <div class="space-y-4">
                <?php foreach ($hasil as $row): ?>
                <div class="bg-white border border-stone-200 rounded-2xl p-5 flex items-center justify-between gap-4">
                    <div>
                        <p class="text-sm font-bold text-slate-900">#<?= $row->id ?> &mdash; <?= html_escape($row->nama_paket) ?></p>
                        <p class="text-xs text-slate-500 mt-1">Tanggal Acara: <?= date('d M Y', strtotime($row->tanggal_acara)) ?></p>
                        <p class="text-xs text-slate-400 mt-1">Dipesan: <?= date('d M Y H:i', strtotime($row->created_at)) ?></p>
                    </div>
                    <?php if ($row->status === 'approved'): ?>
                        <span class="text-xs font-bold px-3 py-1.5 rounded-full bg-emerald-100 text-emerald-700">Approved</span>
                    <?php else: ?>
                        <span class="text-xs font-bold px-3 py-1.5 rounded-full bg-amber-100 text-amber-700">Request</span>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>
