<nav class="navbar navbar-expand-lg navbar-light bg-primary rounded">
    <a class="navbar-brand" href="/"><i class="fa fa-home text-white"></i></a>
    <button class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars text-white"></span>
    </button>
    <div id="navbarSupportedContent" class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
        @foreach ($menus as $menu)
        @if (count($menu->children) == 0)
            <li class="nav-item">
                <a class="nav-link" href="{{ $menu->url }}">{{ $menu->label }}</a>
            </li>
        @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{ $menu->url }}" id="navbarDropdown" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{ $menu->label }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach ($menu->children->sortBy('position') as $sub)
                @if (count($sub->children) == 0)
                    <li><a class="dropdown-item" href="{{ $sub->url }}">{{ $sub->label }}</a></li>
                @else
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="{{ $sub->url }}">{{ $sub->label }}</a>
                        <ul class="dropdown-menu">
                        @foreach ($sub->children->sortBy('position') as $sub2)
                            <li><a class="dropdown-item" href="{{ $sub2->url }}">{{ $sub2->label }}</a></li>
                        @endforeach
                        </ul>
                    </li>
                @endif
                @endforeach
                </ul>
            </li>
        @endif
        @endforeach
        </ul>
    </div>
</nav>