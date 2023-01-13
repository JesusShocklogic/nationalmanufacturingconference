<?php

/*
 * Custom Wordpress Menu
 */
function custom_menu( $menu ) {

    global $wp;
    //getting the Current URL for the active class
    $current_url = home_url( add_query_arg( array(), $wp->request ) ).'/';


    if (($locations = get_nav_menu_locations()) && isset($locations[$menu])) {
        $menu = wp_get_nav_menu_object($locations[$menu]);
        $menu_items = wp_get_nav_menu_items($menu->term_id);
        $menu_list = "\t\t\t\t". '<ul class="nav w-100">' ."\n";

        $cont = 0;

        foreach( $menu_items as $menu_item ) {
            if( $menu_item->menu_item_parent == 0 ) {
                $parent = $menu_item->ID;
                $menu_array = array();

                foreach( $menu_items as $submenu ) {
                    if( $submenu->menu_item_parent == $parent ) {
                        $bool = true;
                        $menu_array[] = '<a class="dropdown-item pl-4 pr-5" target="'.$submenu->target.'" href="' . $submenu->url . '">' . $submenu->title . '</a>' ."\n";
                    }
                }
                if( $bool == true && count( $menu_array ) > 0 ) {
                    $cont = $cont+1;

                    $menu_list .= '<li class="nav-item dropdown nav-item-li-'.$cont.'">' ."\n";
                    $menu_list .= '<a class="nav-link dropdown-toggle nav-item-num-'.$cont.'" href="#" id="navbardrop" data-toggle="dropdown">' . $menu_item->title . ' </a>' ."\n";

                    $menu_list .= '<div class="dropdown-menu p-0">' ."\n";
                    $menu_list .= implode( "\n", $menu_array );
                    $menu_list .= '</div>' ."\n";

                } else {
                    $cont = $cont+1;
                    $menu_list .= '<li class="nav-item nav-item-li-'.$cont.'">' ."\n";
                    if(strcmp($current_url, $menu_item->url) == 0) {
                        $menu_list .= '<a class="'. implode(" ",$menu_item->classes) .' nav-link active nav-item-num-'.$cont.'"
                            target="'.$menu_item->target.'"
                            href="' . $menu_item->url . '">
                            ' . $menu_item->title . '</a>' ."\n";
                    }else {
                        $menu_list .= '<a class="'. implode(" ",$menu_item->classes) .' nav-link nav-item-num-'.$cont.'"
                            target="'.$menu_item->target.'"
                            href="' . $menu_item->url . '">
                            ' . $menu_item->title . '</a>' ."\n";
                    }


                }
            }
            // end <li>
            $menu_list .= '</li>' ."\n";
        }


        $menu_list .= '</ul>' ."\n";
    } else {
        // $menu_list = '<!-- no list defined -->';
    }
    echo $menu_list;
}
// Custom Wordpress Menu