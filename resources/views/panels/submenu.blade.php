{{-- For submenu --}}
<ul class="menu-content">
    @foreach($menu as $submenu)
        <?php

        ?>
        @can($submenu->policy, $user)
            <li class="{{ (request()->is('portal/'.$submenu->url)) ? 'active' : '' }}">
                <a href="@if(isset($submenu->uri)){{route($submenu->uri)}}@else{{'javascript:void(0)'}}@endif">
                    <i class="{{ isset($submenu->icon) ? $submenu->icon : "" }}"></i>
                    <span class="menu-title">{{ $submenu->name }}</span>
                </a>
                @if (isset($submenu->submenu))
                    @include('panels/submenu', ['menu' => $submenu->submenu])
                @endif
            </li>
        @endcan
    @endforeach
</ul>