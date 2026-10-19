<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' - WO JeWePe' : 'WO JeWePe' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        serif: ['Playfair Display', 'serif']
                    },
                    colors: {
                        gold: { 50:'#FBF9F4',100:'#F5EFE3',500:'#C5A880',600:'#A48255',700:'#856534' }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-stone-50 text-slate-800 antialiased font-sans">

<nav class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-md border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
        <a href="<?= base_url() ?>" class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-gold-600 text-white flex items-center justify-center font-serif text-xl font-bold shadow-md">W</div>
            <div>
                <span class="font-serif text-2xl font-bold tracking-tight text-slate-900 block leading-tight">WO JeWePe</span>
                <span class="text-[10px] uppercase tracking-widest text-gold-600 font-semibold">Wedding Organizer</span>
            </div>
        </a>

        <div class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-600">
            <a href="<?= base_url() ?>" class="hover:text-gold-600 transition">Beranda</a>
            <a href="<?= site_url('cek-pesanan') ?>" class="hover:text-gold-600 transition">Cek Pesanan</a>
            <a href="<?= site_url('kontak') ?>" class="hover:text-gold-600 transition">Kontak Kami</a>
        </div>

        <div class="flex items-center gap-3">
            <?php if ($this->session->userdata('admin_logged_in')): ?>
                <a href="<?= site_url('admin') ?>" class="text-xs px-4 py-2.5 rounded-full font-semibold bg-slate-900 text-white hover:bg-slate-800 transition">
                    <i class="fa-solid fa-gauge mr-1"></i> Dashboard
                </a>
                <a href="<?= site_url('logout') ?>" class="text-xs px-4 py-2.5 rounded-full font-semibold border border-slate-300 hover:border-rose-500 hover:text-rose-500 transition">
                    Logout
                </a>
            <?php else: ?>
                <a href="<?= site_url('login') ?>" class="text-xs px-4 py-2.5 rounded-full font-semibold border border-slate-300 hover:border-gold-600 hover:text-gold-600 transition">
                    <i class="fa-solid fa-user-shield mr-1"></i> Login Admin
                </a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<main class="pt-20">
<?php
    $sukses = $this->session->flashdata('sukses');
    $error  = $this->session->flashdata('error');
?>
<?php if ($sukses): ?>
    <div class="max-w-4xl mx-auto mt-6 px-4">
        <div class="bg-emerald-50 border border-emerald-300 text-emerald-800 text-sm rounded-xl px-4 py-3">
            <i class="fa-solid fa-circle-check mr-2"></i><?= $sukses ?>
        </div>
    </div>
<?php endif; ?>
<?php if ($error): ?>
    <div class="max-w-4xl mx-auto mt-6 px-4">
        <div class="bg-rose-50 border border-rose-300 text-rose-800 text-sm rounded-xl px-4 py-3">
            <i class="fa-solid fa-circle-exclamation mr-2"></i><?= $error ?>
        </div>
    </div>
<?php endif; ?>
