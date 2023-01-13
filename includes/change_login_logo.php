<?php
/*
 * Login Page logo
 */
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url("./wp-content/themes/Shocklogic_RCP/img/main-logo.png");
            background-size: contain;
            background-repeat: no-repeat;
            padding-bottom: 30px;
            width: 100%;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );