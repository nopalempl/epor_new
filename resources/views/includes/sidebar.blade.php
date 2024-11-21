@php
    $appSidebarClass = (!empty($appSidebarTransparent)) ? 'app-sidebar-transparent' : '';
@endphp
<!-- BEGIN #sidebar -->
<div id="sidebar" class="app-sidebar {{ $appSidebarClass }}">
    <br>
    <div class="user-info">
        <img class="rounded-circle" style="width: 55px; height: auto;" src="/assets/img/user/user-13.jpg" alt="User Image" />
        <span>
            <span class="username">{{ Auth::user()->fullname }}</span>
            <span class="role">{{ Auth::user()->role ? Auth::user()->role->name : 'Pengguna Tanpa Role' }}</span>
        </span>
    </div>
    <br>
    <hr style="border: 1px solid white; margin-top: 10px;">

    <!-- BEGIN scrollbar -->
    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
        <div class="menu">
            @php
                $currentUrl = (Request::path() != '/') ? '/'. Request::path() : '/';
                
                function renderSubMenu($value, $currentUrl) {
                    $subMenu = '';
                    $GLOBALS['sub_level'] += 1 ;
                    $GLOBALS['active'][$GLOBALS['sub_level']] = '';
                    $currentLevel = $GLOBALS['sub_level'];
                    foreach ($value as $key => $menu) {
                        $GLOBALS['subparent_level'] = '';
                        
                        $subSubMenu = '';
                        $hasSub = (!empty($menu['sub_menu'])) ? 'has-sub' : '';
                        $hasCaret = (!empty($menu['sub_menu'])) ? '<div class="menu-caret"></div>' : '';
                        $hasHighlight = (!empty($menu['highlight'])) ? '<i class="fa fa-paper-plane text-theme ms-1"></i>' : '';
                        $hasTitle = (!empty($menu['title'])) ? '<div class="menu-text">'. $menu['title'] . $hasHighlight .'</div>' : '';
                        
                        if (!empty($menu['sub_menu'])) {
                            $subSubMenu .= '<div class="menu-submenu">';
                            $subSubMenu .= renderSubMenu($menu['sub_menu'], $currentUrl);
                            $subSubMenu .= '</div>';
                        }
                        
                        $active = (!empty($menu['route-name']) && (Route::currentRouteName() == $menu['route-name'])) ? 'active' : '';
                        
                        if ($active) {
                            $GLOBALS['parent_active'] = true;
                            $GLOBALS['active'][$GLOBALS['sub_level'] - 1] = true;
                        }
                        if (!empty($GLOBALS['active'][$currentLevel])) {
                            $active = 'active';
                        }

                        // Pengecekan izin untuk sub-menu
                        if (!isset($menu['permission']) || auth()->user()->can($menu['permission'])) {
                            $subMenu .= '
                                <div class="menu-item '. $hasSub .' '. $active .'">
                                    <a href="'. $menu['url'] .'" class="menu-link">' . $hasTitle . $hasCaret .'</a>
                                    '. $subSubMenu .'
                                </div>
                            ';
                        }
                    }
                    return $subMenu;
                }
                
                foreach (config('sidebar.menu') as $key => $menu) {
                    // Memeriksa izin sebelum menampilkan menu
                    if (!isset($menu['permission']) || auth()->user()->can($menu['permission'])) {
                        $GLOBALS['parent_active'] = '';
                        
                        $hasSub = (!empty($menu['sub_menu'])) ? 'has-sub' : '';
                        $hasCaret = (!empty($menu['caret'])) ? '<div class="menu-caret"></div>' : '';
                        $hasIcon = (!empty($menu['icon'])) ? '<div class="menu-icon"><i class="'. $menu['icon'] .'"></i></div>' : '';
                        $hasImg = (!empty($menu['img'])) ? '<div class="menu-icon-img"><img src="'. $menu['img'] .'" /></div>' : '';
                        $hasLabel = (!empty($menu['label'])) ? '<span class="menu-label">'. $menu['label'] .'</span>' : '';
                        $hasTitle = (!empty($menu['title'])) ? '<div class="menu-text">'. $menu['title'] . $hasLabel .'</div>' : '';
                        $hasBadge = (!empty($menu['badge'])) ? '<div class="menu-badge">'. $menu['badge'] .'</div>' : '';
                        
                        $subMenu = '';
                        
                        if (!empty($menu['sub_menu'])) {
                            $GLOBALS['sub_level'] = 0;
                            $subMenu .= '<div class="menu-submenu">';
                            $subMenu .= renderSubMenu($menu['sub_menu'], $currentUrl);
                            $subMenu .= '</div>';
                        }
                        $active = (!empty($menu['route-name']) && (Route::currentRouteName() == $menu['route-name'])) ? 'active' : '';
                        $active = (empty($active) && !empty($GLOBALS['parent_active'])) ? 'active' : $active;
                        echo '
                            <div class="menu-item '. $hasSub .' '. $active .'">
                                <a href="'. $menu['url'] .'" class="menu-link">
                                    '. $hasImg .'
                                    '. $hasIcon .'
                                    '. $hasTitle .'
                                    '. $hasBadge .'
                                    '. $hasCaret .'
                                </a>
                                '. $subMenu .'
                            </div>
                        ';
                    }
                }
            @endphp

            <!-- BEGIN minify-button -->
            <!-- END minify-button -->
        
        </div>
        <!-- END menu -->
    </div>
    <!-- END scrollbar -->
</div>
<div class="app-sidebar-bg"></div>
<div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>
<!-- END #sidebar -->
