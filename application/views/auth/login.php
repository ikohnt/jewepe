<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<section class="py-20">
    <div class="max-w-md mx-auto px-4">
        <div class="bg-white border border-stone-200 rounded-3xl p-8 shadow-sm">
            <div class="text-center mb-6">
                <div class="w-14 h-14 mx-auto rounded-full bg-gold-600 text-white flex items-center justify-center font-serif text-2xl font-bold shadow-md">W</div>
                <h1 class="text-xl font-serif font-bold text-slate-900 mt-4">Login Admin</h1>
                <p class="text-xs text-slate-500 mt-1">Sign in to continue mengelola WO JeWePe.</p>
            </div>

            <?= form_open('login/proses', array('class' => 'space-y-4')) ?>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Username</label>
                    <input type="text" name="username" required autofocus class="w-full px-4 py-3 bg-white border border-stone-300 rounded-xl text-sm focus:ring-2 focus:ring-gold-500 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Password</label>
                    <input type="password" name="password" required class="w-full px-4 py-3 bg-white border border-stone-300 rounded-xl text-sm focus:ring-2 focus:ring-gold-500 outline-none">
                </div>
                <button type="submit" class="w-full py-3.5 rounded-xl bg-gold-600 hover:bg-gold-700 text-white font-bold text-sm shadow-lg transition">
                    Login
                </button>
            <?= form_close() ?>

            <p class="text-[11px] text-slate-400 text-center mt-6">
                Akun bawaan: <span class="font-semibold">admin</span> / <span class="font-semibold">admin123</span>
                &mdash; ganti setelah instalasi.
            </p>
        </div>
    </div>
</section>
