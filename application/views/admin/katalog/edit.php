<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="max-w-2xl">
    <h2 class="text-2xl font-bold text-slate-900">Ubah Paket Wedding</h2>
    <p class="text-xs text-slate-500 mt-1">Kosongkan kolom gambar jika tidak ingin mengganti foto header.</p>

    <div class="bg-white rounded-2xl border border-slate-200 p-6 md:p-8 shadow-sm mt-6">
        <?= form_open_multipart('admin/katalog/update/' . $katalog->id, array('class' => 'space-y-4 text-xs')) ?>
            <div>
                <label class="block font-bold text-slate-700 mb-1">Nama Paket *</label>
                <input type="text" name="nama_paket" required value="<?= html_escape($katalog->nama_paket) ?>" class="w-full px-3 py-2 border border-slate-300 rounded-xl outline-none focus:ring-2 focus:ring-gold-500">
            </div>
            <div>
                <label class="block font-bold text-slate-700 mb-1">Harga Paket (Rp) *</label>
                <input type="number" name="harga" required value="<?= $katalog->harga ?>" class="w-full px-3 py-2 border border-slate-300 rounded-xl outline-none focus:ring-2 focus:ring-gold-500">
            </div>
            <div class="flex items-center gap-4">
                <img src="<?= base_url('uploads/katalog/' . $katalog->gambar) ?>" class="w-20 h-20 rounded-xl object-cover border border-slate-200">
                <div class="flex-1">
                    <label class="block font-bold text-slate-700 mb-1">Ganti Gambar Header (opsional)</label>
                    <input type="file" name="gambar" accept=".jpg,.jpeg,.png,.gif" class="w-full px-3 py-2 border border-slate-300 rounded-xl outline-none focus:ring-2 focus:ring-gold-500 bg-white">
                </div>
            </div>
            <div>
                <label class="block font-bold text-slate-700 mb-1">Deskripsi &amp; Fasilitas Paket *</label>
                <textarea name="deskripsi" rows="4" required class="w-full px-3 py-2 border border-slate-300 rounded-xl outline-none focus:ring-2 focus:ring-gold-500"><?= html_escape($katalog->deskripsi) ?></textarea>
            </div>
            <div>
                <label class="block font-bold text-slate-700 mb-1">Status Publikasi</label>
                <select name="status" class="w-full px-3 py-2 border border-slate-300 rounded-xl outline-none focus:ring-2 focus:ring-gold-500 bg-white">
                    <option value="publish" <?= $katalog->status === 'publish' ? 'selected' : '' ?>>Publish</option>
                    <option value="draft" <?= $katalog->status === 'draft' ? 'selected' : '' ?>>Draft</option>
                </select>
            </div>
            <div class="flex justify-end gap-2 pt-3">
                <a href="<?= site_url('admin/katalog') ?>" class="px-4 py-2 border border-slate-300 rounded-xl font-bold text-slate-600 hover:bg-slate-50">Batal</a>
                <button type="submit" class="px-5 py-2 bg-gold-600 hover:bg-gold-700 text-white rounded-xl font-bold shadow">Simpan Perubahan</button>
            </div>
        <?= form_close() ?>
    </div>
</div>
