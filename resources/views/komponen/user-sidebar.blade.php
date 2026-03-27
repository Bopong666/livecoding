<div class="col-md-4 animate-box" data-animate-effect="fadeInRight">
    <div>
        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">
            Tags
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="fh5co_tags_all">
        @foreach ($tag as $item)
        <a href="{{ url('tag/'. $item->slug) }}" class="fh5co_tagg">{{ $item->nama }}</a>
        @endforeach
    </div>
    <div>
        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">
            Populer
        </div>
    </div>
    @foreach ($populer as $item)
    <div class="row pb-3">
        <div class="col-4 col-md-5 align-self-center">
            <a href="{{ url('/'. $item->slug) }}">
                <img loading="lazy" src="{{ asset($item->header.'-small.jpg') }}" alt="{{ $item->slug }}"
                    class="fh5co_most_trading" />
            </a>
        </div>
        <div class="col-8 col-md-7 paddding">
            <a href="{{ url('/'. $item->slug) }}" class="most_fh5co_treding_font text-limited">
                {{$item->judul}}
            </a>
            <div class="most_fh5co_treding_font_123">
                {{ $item->publish }}
            </div>
        </div>
    </div>
    @endforeach

</div>