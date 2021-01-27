@inject('menuItemHelper', \JeroenNoten\LaravelAdminLte\Helpers\MenuItemHelper)

@if ($menuItemHelper->isHeader($item))

    {{-- Header --}}
    @include(partials.sidebar.menu-item-header')

@elseif ($menuItemHelper->isSearchBar($item))

    {{-- Search form --}}
    @include(partials.sidebar.menu-item-search-form')

@elseif ($menuItemHelper->isSubmenu($item))

    {{-- Treeview menu --}}
    @include(partials.sidebar.menu-item-treeview-menu')

@elseif ($menuItemHelper->isLink($item))

    {{-- Link --}}
    @include(partials.sidebar.menu-item-link')

@endif
