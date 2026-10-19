<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div>
    <h2 class="text-2xl font-bold text-slate-900">Kelola Profil Website</h2>
    <p class="text-xs text-slate-500 mt-1">Ubah nama perusahaan, kontak, dan jam operasional yang tampil di halaman publik.</p>
</div>

<div class="bg-white rounded-2xl border border-slate-200 p-6 md:p-8 shadow-sm max-w-3xl mt-6">
    <?php if ($profil): ?>
    <?= form_open('admin/profil/update', array('class' => 'space-y-5 text-xs')) ?>
        <input type="hidden" name="id" value="<?= $profil->id ?>">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block font-bold text-slate-700 uppercase mb-2">Nama Website / WO</label>
                <input type="text" name="nama_website" value="<?= html_escape($profil->nama_website) ?>" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-xl outline-none focus:ring-2 focus:ring-gold-500">
            </div>
            <div>
                <label class="block font-bold text-slate-700 uppercase mb-2">Nomor Telepon Utama</label>
                <input type="text" name="telepon" value="<?= html_escape($profil->telepon) ?>" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-xl outline-none focus:ring-2 focus:ring-gold-500">
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block font-bold text-slate-700 uppercase mb-2">Alamat Email Utama</label>
                <input type="email" name="email" value="<?= html_escape($profil->email) ?>" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-xl outline-none focus:ring-2 focus:ring-gold-500">
            </div>
            <div>
                <label class="block font-bold text-slate-700 uppercase mb-2">Header Jam Kerja</label>
                <input type="text" name="jam_header" value="<?= html_escape($profil->jam_header) ?>" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-xl outline-none focus:ring-2 focus:ring-gold-500">
            </div>
        </div>
        <div>
            <label class="block font-bold text-slate-700 uppercase mb-2">Jam Operasional</label>
            <input type="text" name="jam_waktu" value="<?= html_escape($profil->jam_waktu) ?>" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-xl outline-none focus:ring-2 focus:ring-gold-500">
        </div>
        <div>
            <label class="block font-bold text-slate-700 uppercase mb-2">Alamat Kantor Fisik</label>
            <textarea name="alamat" rows="2" class="w-full px-3.5 py-2.5 border border-slate-300 rounded-xl outline-none focus:ring-2 focus:ring-gold-500"><?= html_escape($profil->alamat) ?></textarea>
        </div>
        <button type="submit" class="px-6 py-2.5 bg-gold-600 hover:bg-gold-700 text-white font-bold rounded-xl shadow transition">
            Simpan Perubahan Profil
        </button>
    <?= form_close() ?>
    <?php else: ?>
        <p class="text-slate-400">Data profil belum tersedia. Pastikan tabel tb_profil sudah di-seed (lihat database/jewepe.sql).</p>
    <?php endif; ?>
</div>
