<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="max-w-2xl">
    <h2 class="text-2xl font-bold text-slate-900">Tambah Paket Wedding Baru</h2>
    <p class="text-xs text-slate-500 mt-1">Ukuran gambar maksimal 2MB, format jpg/jpeg/png/gif.</p>

    <div class="bg-white rounded-2xl border border-slate-200 p-6 md:p-8 shadow-sm mt-6">
        <?= form_open_multipart('admin/katalog/simpan', array('class' => 'space-y-4 text-xs')) ?>
            <div>
                <label class="block font-bold text-slate-700 mb-1">Nama Paket *</label>
                <input type="text" name="nama_paket" required placeholder="Contoh: Paket Rose Gold Exclusive" class="w-full px-3 py-2 border border-slate-300 rounded-xl outline-none focus:ring-2 focus:ring-gold-500">
            </div>
            <div>
                <label class="block font-bold text-slate-700 mb-1">Harga Paket (Rp) *</label>
                <input type="number" name="harga" required placeholder="Contoh: 35000000" class="w-full px-3 py-2 border border-slate-300 rounded-xl outline-none focus:ring-2 focus:ring-gold-500">
            </div>
            <div>
                <label class="block font-bold text-slate-700 mb-1">Gambar Header Paket *</label>
                <input type="file" name="gambar" required accept=".jpg,.jpeg,.png,.gif" class="w-full px-3 py-2 border border-slate-300 rounded-xl outline-none focus:ring-2 focus:ring-gold-500 bg-white">
            </div>
            <div>
                <label class="block font-bold text-slate-700 mb-1">Deskripsi &amp; Fasilitas Paket *</label>
                <textarea name="deskripsi" rows="4" required placeholder="Pelaminan 8m, Make up 2x, Katering 400 porsi..." class="w-full px-3 py-2 border border-slate-300 rounded-xl outline-none focus:ring-2 focus:ring-gold-500"></textarea>
            </div>
            <div>
                <label class="block font-bold text-slate-700 mb-1">Status Publikasi</label>
                <select name="status" class="w-full px-3 py-2 border border-slate-300 rounded-xl outline-none focus:ring-2 focus:ring-gold-500 bg-white">
                    <option value="publish">Publish</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
            <div class="flex justify-end gap-2 pt-3">
                <a href="<?= site_url('admin/katalog') ?>" class="px-4 py-2 border border-slate-300 rounded-xl font-bold text-slate-600 hover:bg-slate-50">Batal</a>
                <button type="submit" class="px-5 py-2 bg-gold-600 hover:bg-gold-700 text-white rounded-xl font-bold shadow">Simpan Paket</button>
            </div>
        <?= form_close() ?>
    </div>
</div>
