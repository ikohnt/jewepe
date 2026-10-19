<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<section class="py-16">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="<?= base_url() ?>" class="text-xs text-slate-500 hover:text-gold-600"><i class="fa-solid fa-arrow-left mr-1"></i> Kembali ke Beranda</a>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
            <img src="<?= base_url('uploads/katalog/' . $katalog->gambar) ?>" alt="<?= html_escape($katalog->nama_paket) ?>" class="w-full h-80 object-cover rounded-3xl border border-stone-200 shadow-sm">

            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-gold-600">Paket Wedding</span>
                <h1 class="text-3xl font-serif font-bold text-slate-900 mt-1"><?= html_escape($katalog->nama_paket) ?></h1>
                <p class="text-2xl font-bold text-gold-600 mt-3">Rp <?= number_format($katalog->harga, 0, ',', '.') ?></p>
                <p class="text-sm text-slate-600 mt-5 leading-relaxed whitespace-pre-line"><?= html_escape($katalog->deskripsi) ?></p>

                <a href="<?= site_url('pesan/' . $katalog->id) ?>" class="mt-8 inline-flex items-center gap-2 px-6 py-3.5 rounded-full bg-gold-600 hover:bg-gold-700 text-white text-sm font-bold shadow-lg transition">
                    <i class="fa-solid fa-paper-plane"></i> Pesan Paket Ini
                </a>
            </div>
        </div>
    </div>
</section>
