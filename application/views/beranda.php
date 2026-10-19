<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<section class="relative py-28 md:py-36 bg-gradient-to-br from-stone-100 via-white to-stone-100 overflow-hidden border-b border-stone-200">
    <div class="absolute inset-0 opacity-20 pointer-events-none" style="background-image: radial-gradient(#C5A880 1px, transparent 1px); background-size: 32px 32px;"></div>
    <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
        <span class="inline-block py-1 px-3 rounded-full bg-gold-50 border border-gold-100 text-[10px] font-bold uppercase tracking-widest text-gold-600 mb-4 shadow-sm">Wedding Organizer</span>
        <h1 class="text-4xl md:text-6xl font-serif font-bold text-slate-900 mt-2 leading-tight tracking-tight drop-shadow-sm">
            <?= $profil ? html_escape($profil->nama_website) : 'Wedding Organizer JeWePe' ?>
        </h1>
        <p class="text-sm md:text-lg text-slate-500 mt-6 max-w-2xl mx-auto leading-relaxed">
            Mengabadikan setiap momen pernikahan Anda. Pilih paket wedding favorit, lakukan pemesanan online, dan pantau statusnya secara langsung.
        </p>
        <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="#katalog" class="w-full sm:w-auto px-8 py-3.5 rounded-full bg-gradient-to-r from-gold-600 to-gold-500 hover:from-gold-500 hover:to-gold-400 text-white text-sm font-bold shadow-lg shadow-gold-500/30 hover:shadow-xl hover:shadow-gold-500/40 hover:-translate-y-0.5 transition-all duration-300 ease-out active:scale-95">
                Lihat Katalog Paket
            </a>
            <a href="<?= site_url('kontak') ?>" class="w-full sm:w-auto px-8 py-3.5 rounded-full bg-white border border-slate-200 hover:border-gold-300 hover:text-gold-600 hover:bg-gold-50 text-slate-700 text-sm font-bold shadow-sm hover:shadow-md transition-all duration-300 ease-out active:scale-95">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

<section id="katalog" class="py-24 bg-stone-50/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-xs font-bold uppercase tracking-wider text-gold-600">Katalog Pilihan</span>
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-slate-900 mt-2">Paket Pernikahan Unggulan</h2>
            <div class="h-1 w-20 bg-gold-500 mx-auto mt-6 rounded-full opacity-60"></div>
        </div>  

        <?php if (empty($katalog)): ?>
            <div class="text-center py-20 bg-white rounded-3xl border border-dashed border-stone-300 shadow-sm">
                <i class="fa-solid fa-box-open text-4xl text-slate-300 mb-3"></i>
                <p class="text-sm text-slate-400 font-medium">Belum ada paket yang dipublikasikan.</p>
            </div>
        <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($katalog as $row): ?>
            <div class="group bg-white rounded-[2rem] border border-stone-200 shadow-sm hover:shadow-2xl hover:shadow-gold-900/5 hover:-translate-y-2 overflow-hidden flex flex-col transition-all duration-500 ease-out">
                <div class="relative h-60 w-full overflow-hidden bg-stone-100">
                    <img src="<?= base_url('uploads/katalog/' . $row->gambar) ?>" alt="<?= html_escape($row->nama_paket) ?>" class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </div>
                <div class="p-8 flex-1 flex flex-col relative bg-white">
                    <div class="absolute -top-6 right-6 bg-white px-4 py-1.5 rounded-full shadow-lg text-gold-600 font-bold text-sm border border-stone-100">
                        Rp <?= number_format($row->harga, 0, ',', '.') ?>
                    </div>
                    <h3 class="font-serif font-bold text-xl text-slate-900 group-hover:text-gold-600 transition-colors mt-2"><?= html_escape($row->nama_paket) ?></h3>
                    <p class="text-sm text-slate-500 mt-4 flex-1 leading-relaxed line-clamp-3">
                        <?= character_limiter(html_escape($row->deskripsi), 120) ?>
                    </p>
                    <div class="mt-8 flex gap-3">
                        <a href="<?= site_url('katalog/' . $row->id) ?>" class="flex-1 text-center px-4 py-3 rounded-2xl bg-stone-50 border border-stone-200 text-xs font-bold text-slate-600 hover:bg-white hover:border-gold-400 hover:text-gold-600 hover:shadow-md transition-all duration-300 active:scale-95">
                            Detail Paket
                        </a>
                        <a href="<?= site_url('pesan/' . $row->id) ?>" class="flex-1 text-center px-4 py-3 rounded-2xl bg-slate-900 hover:bg-gold-600 text-white text-xs font-bold shadow-md hover:shadow-lg hover:shadow-gold-500/30 transition-all duration-300 active:scale-95">
                            Booking
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

