<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$CI =& get_instance();
$CI->load->model('Profil_model');
$footer_profil = $CI->Profil_model->get_profil();
?>
</main>

<footer class="bg-slate-900 text-slate-400 py-16 border-t border-slate-800 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div>
                <div class="flex items-center gap-2 text-white font-serif text-2xl font-bold mb-4">
                    <span><?= $footer_profil ? html_escape($footer_profil->nama_website) : 'WO JeWePe' ?></span>
                </div>
                <p class="text-xs leading-relaxed text-slate-400">
                    <?= $footer_profil ? html_escape($footer_profil->alamat) : '-' ?>
                </p>
            </div>
            <div>
                <h4 class="text-white font-bold text-sm mb-3">Kontak Resmi</h4>
                <ul class="text-xs space-y-2">
                    <li><i class="fa-solid fa-phone mr-2 text-gold-500"></i> <?= $footer_profil ? html_escape($footer_profil->telepon) : '-' ?></li>
                    <li><i class="fa-solid fa-envelope mr-2 text-gold-500"></i> <?= $footer_profil ? html_escape($footer_profil->email) : '-' ?></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold text-sm mb-3">Jam Operasional Layanan</h4>
                <p class="text-xs font-semibold text-slate-300"><?= $footer_profil ? html_escape($footer_profil->jam_header) : '-' ?></p>
                <p class="text-xs text-slate-400 mt-1"><?= $footer_profil ? html_escape($footer_profil->jam_waktu) : '-' ?></p>
            </div>
        </div>
        <div class="border-t border-slate-800 mt-12 pt-6 text-center text-xs text-slate-500">
            &copy; <?= date('Y') ?> Wedding Organizer JeWePe &mdash; Dibangun dengan CodeIgniter 3 untuk Studi Kasus Pembekalan.
        </div>
    </div>
</footer>

</body>
</html>
