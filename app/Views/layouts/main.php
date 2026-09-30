<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?= esc($title ?? 'Mohan Brothers — Ambros India | Laboratory Equipment & Educational Models') ?></title>
    <meta name="description"
        content="<?= esc($meta_description ?? 'Mohan Brothers (Ambros India) delivers high-precision laboratory equipment, engineering apparatus, and educational models for universities and colleges across India.') ?>">
    <meta name="keywords"
        content="laboratory equipment, engineering models, fluid mechanics lab, thermodynamics, theory of machines, Ambros India, Mohan Brothers">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= esc($title ?? 'Mohan Brothers — Ambros India') ?>">
    <meta property="og:description"
        content="<?= esc($meta_description ?? 'Precision Engineering & Laboratory Equipment.') ?>">
    <meta property="og:image" content="<?= base_url('assets/images/logo.png') ?>">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/logo.png') ?>">

    <!-- Google Fonts Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Application Stylesheets -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>?v=<?= time() ?>">

    <!-- Inline Theme Initializer to prevent flash of wrong theme (Default: Light Theme) -->
    <script>
        (function () {
            var savedTheme = localStorage.getItem('Ambros_theme') || localStorage.getItem('ambross_theme');
            if (savedTheme === 'dark') {
                document.documentElement.setAttribute('data-theme', 'dark');
            } else {
                document.documentElement.setAttribute('data-theme', 'light');
            }
        })();
    </script>

    <?= $this->renderSection('extra_head') ?>
</head>

<body>

    <!-- Main Navigation Bar -->
    <?= $this->include('partials/navbar') ?>

    <!-- Main Page Content -->
    <main id="mainContent">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Global Footer -->
    <?= $this->include('partials/footer') ?>

    <!-- Quick Search Modal -->
    <?= $this->include('partials/search_modal') ?>

    <!-- Application Scripts -->
    <script src="<?= base_url('assets/js/main.js') ?>?v=<?= time() ?>"></script>
    <?= $this->renderSection('extra_scripts') ?>
</body>

</html>