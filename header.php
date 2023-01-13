<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php the_title() ?></title>

    <?php
    $settings = get_id_by_slug('settings');
    $fav = get_field('fav_icon', $settings); ?>
    <!-- Fav Icons -->
    <link rel="apple-touch-icon" type="image/png" href="<?= $fav ?>">
    <link rel="shortcut icon" type="image/png" href="<?= $fav ?>">
    <link rel="icon" type="image/png" href="<?= $fav ?>">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/5ca9333657.js" crossorigin="anonymous"></script>


    <?php wp_head(); ?>

    <?php
    $title_color = get_field('titles_colors', $settings);
    $menu_color = get_field('menu_colors', $settings);
    $decoration_color_1 = get_field('decoration_colors_1', $settings);
    $decoration_color_2 = get_field('decoration_colors_2', $settings);
    $decoration_color_hover = get_field('decoration_colors_3', $settings);
    $bg_1 = get_field('background_1', $settings);
    $bg_2 = get_field('background_2', $settings);
    ?>
    <style>
        header,
        header a {
            color: <?= $menu_color; ?>;
        }

        .title {
            color: <?= $title_color; ?>;
        }

        a,
        a:hover {
            color: <?= $decoration_color_1; ?>;
        }

        .dcolor_1_color {
            color: <?= $decoration_color_1; ?> !important;
        }

        .dcolor_1_bg {
            background-color: <?= $decoration_color_1; ?>;
        }

        .dcolor_2_color {
            color: <?= $decoration_color_2; ?> !important;
        }

        .dcolor_2_bg {
            background-color: <?= $decoration_color_2; ?>;
        }

        .bg-1 {
            background-color: <?= $bg_1; ?>;
        }

        .bg-2 {
            background-color: <?= $bg_2; ?>;
        }

        .btn {
            background-color: <?= $decoration_color_1; ?>;
            color: <?= $decoration_color_2; ?>;
            min-width: 150px;
        }

        .btn:hover {
            background-color: <?= $decoration_color_hover; ?>;
            color: <?= $decoration_color_2 ?>;
        }

        .slider-speakers-index #speaker:hover,
        #speakerLoop #speaker:hover {
            color: <?= $decoration_color_1; ?>;
        }

        .slick-arrow,
        .slick-prev:before,
        .slick-next:before {
            color: <?= $decoration_color_1; ?> !important;
        }

        .dropdown-item:hover {
            background-color: <?= $decoration_color_1; ?> !important;
            color: <?= $decoration_color_2; ?>;
        }

        hr {
            background-color: <?= $decoration_color_1; ?>;
        }

        ul li:before {
            color: <?= $decoration_color_1; ?>;
        }

        table {
            -moz-border-radius: 5px !important;
            border-collapse: collapse !important;
            border: none !important;
            border-radius: 10px;
            overflow: hidden;
        }

        table thead tr {
            background-color: <?= $decoration_color_1; ?> !important;
            color: <?= $decoration_color_2; ?>;
            height: 60px;
        }

        table tbody tr:first-child {
            background-color: <?= $menu_color; ?> !important;
            color: <?= $decoration_color_2; ?>;
        }

        table th,
        table td {
            padding: 10px 20px;
        }

        .slick-prev:before {
            content: url("<?= get_template_directory_uri(); ?>/img/arrow-left.svg") !important;
        }

        .slick-next:before {
            content: url("<?= get_template_directory_uri(); ?>/img/arrow-right.svg") !important;
        }
    </style>
</head>

<body>
    <header>
        <div class="d-none d-xl-block">
            <nav class="navbar navbar-expand-xl navbar-light bg-light py-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand d-block" href="<?= get_home_url(); ?>">
                    <img class="d-block img-fluid mr-auto" src="<?= get_field('main_logo', $settings) ?>" alt="">
                </a>
                <div class="collapse navbar-collapse pl-4" id="navbarTogglerDemo01">
                    <?php custom_menu("main-menu"); ?>
                </div>
                <div class="d-none d-xl-block">
                    <?= print_button('menu_right_button_information', $settings) ?>
                </div>
            </nav>
        </div>

        <div class="d-block d-xl-none">
            <nav class="navbar navbar-expand-xl navbar-light bg-light py-0 px-4">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand d-block" href="<?= get_home_url(); ?>">
                    <img class="d-block img-fluid mr-auto" src="<?= get_field('main_logo', $settings) ?>" alt="">
                </a>
                <div class="collapse navbar-collapse pl-4" id="navbarTogglerDemo01">
                    <?php custom_menu("main-menu"); ?>
                    <?= print_button('menu_right_button_information', $settings) ?>
                </div>
            </nav>
        </div>
    </header>
