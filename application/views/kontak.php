<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<section class="py-16">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-xs font-bold uppercase tracking-widest text-gold-600">Kontak Kami</span>
        <h1 class="text-3xl font-serif font-bold text-slate-900 mt-1">Hubungi Wedding Organizer JeWePe</h1>
        <p class="text-sm text-slate-500 mt-3">Kami siap membantu mewujudkan hari pernikahan impian Anda.</p>
    </div>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 mt-10 grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
        <div class="bg-white border border-stone-200 rounded-2xl p-6">
            <i class="fa-solid fa-phone text-gold-600 text-xl"></i>
            <p class="text-xs text-slate-500 mt-3">Telepon / WhatsApp</p>
            <p class="text-sm font-bold text-slate-900 mt-1"><?= $profil ? html_escape($profil->telepon) : '-' ?></p>
        </div>
        <div class="bg-white border border-stone-200 rounded-2xl p-6">
            <i class="fa-solid fa-envelope text-gold-600 text-xl"></i>
            <p class="text-xs text-slate-500 mt-3">Email</p>
            <p class="text-sm font-bold text-slate-900 mt-1"><?= $profil ? html_escape($profil->email) : '-' ?></p>
        </div>
        <div class="bg-white border border-stone-200 rounded-2xl p-6">
            <i class="fa-solid fa-clock text-gold-600 text-xl"></i>
            <p class="text-xs text-slate-500 mt-3"><?= $profil ? html_escape($profil->jam_header) : '-' ?></p>
            <p class="text-sm font-bold text-slate-900 mt-1"><?= $profil ? html_escape($profil->jam_waktu) : '-' ?></p>
        </div>
    </div>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        <div class="bg-white border border-stone-200 rounded-2xl p-6 text-center">
            <i class="fa-solid fa-location-dot text-gold-600 text-xl"></i>
            <p class="text-xs text-slate-500 mt-3">Alamat Kantor</p>
            <p class="text-sm font-bold text-slate-900 mt-1"><?= $profil ? html_escape($profil->alamat) : '-' ?></p>
        </div>
    </div>
</section>
