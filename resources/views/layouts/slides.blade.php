<div id="slides" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
        @php
            $i = 0;
        @endphp
        @foreach ($slides as $slide)
        <li data-target="#slides" data-slide-to="{!! $i !!}" class="{{ $i == 0 ? 'active' : '' }}"></li>
        @php
            $i++;
        @endphp
        @endforeach
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
        @php
            $i = 0;
        @endphp
        @foreach ($slides as $slide)
        <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
            <a href="{{ $slide->url }}" target="_blank">
                <img class="d-block" src="upload/website/slides/{{ $slide->image }}" alt="">
            </a>
        </div>
        @php
            $i++;
        @endphp
        @endforeach
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#slides" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#slides" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>

</div>