<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('frontend_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/fasilitas*") ? "c-show" : "" }} {{ request()->is("admin/profiles*") ? "c-show" : "" }} {{ request()->is("admin/abouts*") ? "c-show" : "" }} {{ request()->is("admin/blogs*") ? "c-show" : "" }} {{ request()->is("admin/orders*") ? "c-show" : "" }} {{ request()->is("admin/tims*") ? "c-show" : "" }} {{ request()->is("admin/sosial-media*") ? "c-show" : "" }} {{ request()->is("admin/footers*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-globe c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.frontend.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('home_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/abouts*") ? "c-show" : "" }} {{ request()->is("admin/footers*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-home icon c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.home.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('about_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.abouts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/abouts") || request()->is("admin/abouts/*") ? "c-active" : "" }}">
                                            <i class="fa-fw far fa-address-card c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.about.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('benner_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.benners.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/benners") || request()->is("admin/benners/*") ? "c-active" : "" }}">
                                            <i class="fa-fw far fa-newspaper c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.benner.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('footer_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.footers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/footers") || request()->is("admin/footers/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-shoe-prints c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.footer.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('aboutweb_access')
                    <li class="c-sidebar-nav-dropdown {{ request()->is("admin/abouts*") ? "c-show" : "" }} {{ request()->is("admin/footers*") ? "c-show" : "" }}">
                        <a class="c-sidebar-nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                            </i>
                            {{ trans('cruds.aboutweb.title') }}
                        </a>
                        <ul class="c-sidebar-nav-dropdown-items">
                            @can('about_access')
                                <li class="c-sidebar-nav-item">
                                    <a href="{{ route("admin.abouts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/abouts") || request()->is("admin/abouts/*") ? "c-active" : "" }}">
                                        <i class="fa-fw far fa-address-card c-sidebar-nav-icon">

                                        </i>
                                        {{ trans('cruds.about.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('benner_access')
                                <li class="c-sidebar-nav-item">
                                    <a href="{{ route("admin.benners.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/benners") || request()->is("admin/benners/*") ? "c-active" : "" }}">
                                        <i class="fa-fw far fa-newspaper c-sidebar-nav-icon">

                                        </i>
                                        {{ trans('cruds.benner.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('footer_access')
                                <li class="c-sidebar-nav-item">
                                    <a href="{{ route("admin.footers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/footers") || request()->is("admin/footers/*") ? "c-active" : "" }}">
                                        <i class="fa-fw fas fa-shoe-prints c-sidebar-nav-icon">

                                        </i>
                                        {{ trans('cruds.footer.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('fasilitas_access')
                                <li class="c-sidebar-nav-item">
                                    <a href="{{ route("admin.fasilitas.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/fasilitas") || request()->is("admin/fasilitas/*") ? "c-active" : "" }}">
                                        <i class="fa-fw fas fa-concierge-bell c-sidebar-nav-icon">

                                        </i>
                                        {{ trans('cruds.fasilitas.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @can('menu_access')
                    <li class="c-sidebar-nav-dropdown {{ request()->is("admin/abouts*") ? "c-show" : "" }} {{ request()->is("admin/footers*") ? "c-show" : "" }}">
                        <a class="c-sidebar-nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-bars c-sidebar-nav-icon">

                            </i>
                            {{ trans('cruds.menu.title') }}
                        </a>
                        <ul class="c-sidebar-nav-dropdown-items">
                            @can('about_access')
                                <li class="c-sidebar-nav-item">
                                    <a href="{{ route("admin.abouts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/abouts") || request()->is("admin/abouts/*") ? "c-active" : "" }}">
                                        <i class="fa-fw far fa-address-card c-sidebar-nav-icon">

                                        </i>
                                        {{ trans('cruds.about.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('benner_access')
                                <li class="c-sidebar-nav-item">
                                    <a href="{{ route("admin.benners.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/benners") || request()->is("admin/benners/*") ? "c-active" : "" }}">
                                        <i class="fa-fw far fa-newspaper c-sidebar-nav-icon">

                                        </i>
                                        {{ trans('cruds.benner.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('footer_access')
                                <li class="c-sidebar-nav-item">
                                    <a href="{{ route("admin.footers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/footers") || request()->is("admin/footers/*") ? "c-active" : "" }}">
                                        <i class="fa-fw fas fa-shoe-prints c-sidebar-nav-icon">

                                        </i>
                                        {{ trans('cruds.footer.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @can('order_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.orders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/orders") || request()->is("admin/orders/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-shopping-basket c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.order.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('tim_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tims.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tims") || request()->is("admin/tims/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-teamspeak c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tim.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sosial_medium_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sosial-media.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sosial-media") || request()->is("admin/sosial-media/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-share-square c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.sosialMedium.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('footer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.footers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/footers") || request()->is("admin/footers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-shoe-prints c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.footer.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('fn_b_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/tables*") ? "c-show" : "" }} {{ request()->is("admin/reservations*") ? "c-show" : "" }} {{ request()->is("admin/prices*") ? "c-show" : "" }} {{ request()->is("admin/products*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-utensils c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.fnB.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('table_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tables.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tables") || request()->is("admin/tables/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-table c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.table.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('reservation_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.reservations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reservations") || request()->is("admin/reservations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-book-open c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.reservation.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('takeaway_access')
                    <li class="c-sidebar-nav-item">
                        <a href="{{ route("admin.takeaways.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/takeaways") || request()->is("admin/takeaways/*") ? "c-active" : "" }}">
                            <i class="fa-fw fas fa-shopping-bag c-sidebar-nav-icon">

                            </i>
                            {{ trans('cruds.takeaway.title') }}
                        </a>
                    </li>
                @endcan
                    @can('price_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.prices.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/prices") || request()->is("admin/prices/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-money-bill-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.price.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('product_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.products.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-product-hunt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.product.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>