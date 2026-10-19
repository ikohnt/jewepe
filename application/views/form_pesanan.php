<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<section class="py-16">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white border border-stone-200 rounded-3xl p-8 sm:p-10 shadow-sm">
            <div class="text-center mb-8 border-b border-stone-200 pb-6">
                <span class="text-xs font-bold uppercase tracking-widest text-gold-600">Reservasi Online</span>
                <h2 class="text-2xl sm:text-3xl font-serif font-bold text-slate-900 mt-1">Formulir Pemesanan Paket</h2>
                <p class="text-xs text-slate-500 mt-2">
                    Gunakan alamat email aktif sebagai identitas Anda. Status awal pesanan adalah
                    <strong class="text-amber-600">Request</strong>, admin akan mengonfirmasi via balasan email
                    setelah status berubah menjadi <strong class="text-emerald-600">Approved</strong>.
                </p>
            </div>

            <?php if (isset($katalog) && $katalog): ?>
            <div class="flex items-center gap-4 mb-6 p-4 bg-stone-50 border border-stone-200 rounded-2xl">
                <img src="<?= base_url('uploads/katalog/' . $katalog->gambar) ?>" class="w-16 h-16 rounded-xl object-cover">
                <div>
                    <p class="text-sm font-bold text-slate-900"><?= html_escape($katalog->nama_paket) ?></p>
                    <p class="text-xs text-gold-600 font-semibold">Rp <?= number_format($katalog->harga, 0, ',', '.') ?></p>
                </div>
            </div>
            <?php endif; ?>

            <?php echo validation_errors('<div class="mb-4 text-xs text-rose-600 bg-rose-50 border border-rose-200 rounded-xl p-3">', '</div>'); ?>

            <?= form_open('pesan/simpan', array('class' => 'space-y-5')) ?>
                <input type="hidden" name="id_katalog" value="<?= isset($katalog) && $katalog ? $katalog->id : set_value('id_katalog') ?>">

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nama Lengkap Pemesan *</label>
                    <input type="text" name="nama_pemesan" value="<?= set_value('nama_pemesan') ?>" required placeholder="Contoh: Hendriko Hein Kaligis" class="w-full px-4 py-3 bg-white border border-stone-300 rounded-xl text-sm focus:ring-2 focus:ring-gold-500 outline-none">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Alamat Email (Identitas) *</label>
                        <input type="email" name="email" value="<?= set_value('email') ?>" required placeholder="nama@email.com" class="w-full px-4 py-3 bg-white border border-stone-300 rounded-xl text-sm focus:ring-2 focus:ring-gold-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nomor WhatsApp / HP *</label>
                        <input type="tel" name="no_hp" value="<?= set_value('no_hp') ?>" required placeholder="08123456789" class="w-full px-4 py-3 bg-white border border-stone-300 rounded-xl text-sm focus:ring-2 focus:ring-gold-500 outline-none">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Tanggal Rencana Acara *</label>
                    <input type="date" name="tanggal_acara" value="<?= set_value('tanggal_acara') ?>" required class="w-full px-4 py-3 bg-white border border-stone-300 rounded-xl text-sm focus:ring-2 focus:ring-gold-500 outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Catatan Khusus / Permintaan Tema</label>
                    <textarea name="catatan" rows="3" placeholder="Tuliskan catatan khusus terkait preferensi venue, nuansa warna, atau waktu acara..." class="w-full px-4 py-3 bg-white border border-stone-300 rounded-xl text-sm focus:ring-2 focus:ring-gold-500 outline-none"><?= set_value('catatan') ?></textarea>
                </div>

                <button type="submit" class="w-full py-4 rounded-xl bg-gold-600 hover:bg-gold-700 text-white font-bold text-sm shadow-lg transition flex items-center justify-center gap-2">
                    <i class="fa-solid fa-paper-plane"></i>
                    <span>Kirim Formulir Pemesanan (Request)</span>
                </button>
            <?= form_close() ?>
        </div>
    </div>
</section>
