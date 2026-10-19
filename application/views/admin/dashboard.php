<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div>
    <h2 class="text-2xl font-bold text-slate-900">Dashboard Utama</h2>
    <p class="text-xs text-slate-500 mt-1">Ringkasan operasional reservasi Wedding Organizer JeWePe.</p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-6">
    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
        <div class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Katalog Paket</div>
        <div class="text-3xl font-bold text-slate-900 mt-2"><?= $total_katalog ?></div>
        <span class="text-[11px] text-emerald-600 font-semibold mt-1 inline-block">Aktif &amp; Draft</span>
    </div>
    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
        <div class="text-xs font-bold text-slate-400 uppercase tracking-wider">Pesanan Baru (Request)</div>
        <div class="text-3xl font-bold text-amber-600 mt-2"><?= $total_request ?></div>
        <span class="text-[11px] text-amber-700 font-semibold mt-1 inline-block">Menunggu Persetujuan</span>
    </div>
    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
        <div class="text-xs font-bold text-slate-400 uppercase tracking-wider">Disetujui (Approved)</div>
        <div class="text-3xl font-bold text-emerald-600 mt-2"><?= $total_approved ?></div>
        <span class="text-[11px] text-slate-400 font-semibold mt-1 inline-block">Terkonfirmasi via Email</span>
    </div>
    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
        <div class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Reservasi</div>
        <div class="text-3xl font-bold text-slate-900 mt-2"><?= $total_pesanan ?></div>
        <span class="text-[11px] text-slate-500 font-semibold mt-1 inline-block">Akumulasi Pesanan Masuk</span>
    </div>
</div>

<div class="mt-8 flex flex-wrap gap-3">
    <a href="<?= site_url('admin/katalog/tambah') ?>" class="px-4 py-2.5 bg-gold-600 hover:bg-gold-700 text-white rounded-xl text-xs font-bold shadow">+ Tambah Paket Katalog</a>
    <a href="<?= site_url('admin/pesanan') ?>" class="px-4 py-2.5 bg-slate-900 hover:bg-slate-800 text-white rounded-xl text-xs font-bold shadow">Kelola Pesanan Masuk</a>
</div>
