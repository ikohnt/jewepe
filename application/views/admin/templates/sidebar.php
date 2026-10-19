<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $uri2 = $this->uri->segment(2); ?>
<aside class="w-64 bg-slate-900 text-slate-300 p-5 flex flex-col justify-between shrink-0">
    <div class="space-y-6">
        <div class="border-b border-slate-800 pb-4">
            <span class="text-[10px] uppercase tracking-wider text-slate-500 font-bold block">Administrator Mode</span>
            <h3 class="text-sm font-bold text-white mt-0.5">JeWePe Control Panel</h3>
            <p class="text-[11px] text-slate-500 mt-1">Halo, <?= html_escape($this->session->userdata('admin_nama')) ?></p>
        </div>
        <nav class="space-y-1.5 text-xs font-medium">
            <a href="<?= site_url('admin') ?>" class="w-full text-left px-3.5 py-2.5 rounded-xl flex items-center gap-3 <?= ($uri2 === 'dashboard' || $uri2 === '' || $uri2 === NULL) ? 'bg-gold-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' ?>">
                <i class="fa-solid fa-gauge w-4"></i> Dashboard
            </a>
            <a href="<?= site_url('admin/katalog') ?>" class="w-full text-left px-3.5 py-2.5 rounded-xl flex items-center gap-3 <?= $uri2 === 'katalog' ? 'bg-gold-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' ?>">
                <i class="fa-solid fa-boxes-stacked w-4"></i> Management Catalogue
            </a>
            <a href="<?= site_url('admin/pesanan') ?>" class="w-full text-left px-3.5 py-2.5 rounded-xl flex items-center gap-3 <?= $uri2 === 'pesanan' ? 'bg-gold-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' ?>">
                <i class="fa-solid fa-clipboard-check w-4"></i> Manajemen Pemesanan
            </a>
            <a href="<?= site_url('admin/laporan') ?>" class="w-full text-left px-3.5 py-2.5 rounded-xl flex items-center gap-3 <?= $uri2 === 'laporan' ? 'bg-gold-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' ?>">
                <i class="fa-solid fa-file-invoice-dollar w-4"></i> Laporan Pemesanan
            </a>
            <a href="<?= site_url('admin/profil') ?>" class="w-full text-left px-3.5 py-2.5 rounded-xl flex items-center gap-3 <?= $uri2 === 'profil' ? 'bg-gold-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' ?>">
                <i class="fa-solid fa-sliders w-4"></i> Managemen Profile Web
            </a>
        </nav>
    </div>
    <div class="border-t border-slate-800 pt-4 space-y-2">
        <a href="<?= base_url() ?>" class="w-full block text-center py-2.5 px-3 rounded-xl bg-slate-800 text-slate-300 hover:bg-slate-700 text-xs font-bold">
            <i class="fa-solid fa-eye"></i> Lihat Situs Publik
        </a>
        <a href="<?= site_url('logout') ?>" class="w-full block text-center py-2.5 px-3 rounded-xl bg-rose-600/20 text-rose-400 hover:bg-rose-600/30 text-xs font-bold">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
    </div>
</aside>

<main class="flex-1 p-6 md:p-10 overflow-y-auto">
<?php
    $sukses = $this->session->flashdata('sukses');
    $error  = $this->session->flashdata('error');
?>
<?php if ($sukses): ?>
    <div class="mb-6 bg-emerald-50 border border-emerald-300 text-emerald-800 text-sm rounded-xl px-4 py-3">
        <i class="fa-solid fa-circle-check mr-2"></i><?= $sukses ?>
    </div>
<?php endif; ?>
<?php if ($error): ?>
    <div class="mb-6 bg-rose-50 border border-rose-300 text-rose-800 text-sm rounded-xl px-4 py-3">
        <i class="fa-solid fa-circle-exclamation mr-2"></i><?= $error ?>
    </div>
<?php endif; ?>
