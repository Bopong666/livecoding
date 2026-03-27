<div class="container-fluid fh5co_footer_bg pb-3"
    style="background-image: url('{{ asset('user/images/bgbot.webp') }}');">
    <div class="container animate-box pt-5">
        <div class="row">
            <div class="clearfix"></div>
            <div class="col-12 col-md-3 col-lg-3">

                <div class="footer_main_title py-3">Kontak</div>

                <p class="text-white"><i class="fa fa-map-marker mr-2"></i> {{ $info['alamat'] }}</p>
                <p class="text-white"><i class="fa fa-phone mr-2"></i>+62 {{ $info['no_hp'] }}</p>
                <p class="text-white"><i class="fa fa-envelope mr-2"></i>{{ $info['email'] }}</p>
                <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Ikuti Kami</h6>

                <div class="footer_mediya_icon" style="color: white">
                    <div class="text-center d-inline-block">
                        <a class="fh5co_display_table_footer">
                            <div class="fh5co_verticle_middle">
                                <i class="fa fa-linkedin"></i>
                            </div>
                        </a>
                    </div>
                    <div class="text-center d-inline-block">
                        <a class="fh5co_display_table_footer">
                            <div class="fh5co_verticle_middle">
                                <i class="fa fa-google-plus"></i>
                            </div>
                        </a>
                    </div>
                    <div class="text-center d-inline-block">
                        <a class="fh5co_display_table_footer">
                            <div class="fh5co_verticle_middle">
                                <i class="fa fa-twitter"></i>
                            </div>
                        </a>
                    </div>
                    <div class="text-center d-inline-block">
                        <a class="fh5co_display_table_footer">
                            <div class="fh5co_verticle_middle">
                                <i class="fa fa-facebook"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-3">
                <div class="footer_main_title py-3">Informasi Tambahan</div>
                <ul class="footer_menu">
                    <li>
                        <a href="{{ url('disclaimer') }}" class="text-capitalize"><i
                                class="fa fa-angle-right"></i>&nbsp;&nbsp;
                            Disclaimer</a>
                    </li>
                    <li>
                        <a href="{{ url('kategori/advertorial') }}" class="text-capitalize"><i
                                class="fa fa-angle-right"></i>&nbsp;&nbsp;
                            Advertorial</a>
                    </li>
                    <li>
                        <a href="{{ url('info-pengunjung') }}" class="text-capitalize"><i
                                class="fa fa-angle-right"></i>&nbsp;&nbsp;
                            Info Pengunjung</a>
                    </li>
                    <li>
                        <a href="{{ url('pedoman-media-siber') }}" class="text-capitalize"><i
                                class="fa fa-angle-right"></i>&nbsp;&nbsp;
                            Pedoman Media Siber</a>
                    </li>
                    <li>
                        <a href="{{ url('kerja-sama') }}" class="text-capitalize"><i
                                class="fa fa-angle-right"></i>&nbsp;&nbsp;
                            Kerja Sama</a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-md-2 col-lg-2">
                <div class="footer_main_title py-3">Kategori</div>
                <ul class="footer_menu">
                    @foreach ($kategori as $item)
                    <li>
                        <a href="{{ url('kategori/'. $item->slug) }}" class="text-capitalize"><i
                                class="fa fa-angle-right"></i>&nbsp;&nbsp; {{
                            $item->nama }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-12 col-md-4 col-lg-4 position_footer_relative">
                <div class="footer_main_title py-3">
                    Berita Terpopuler
                </div>
                @foreach ($populerFooter as $item)
                <div class="footer_makes_sub_font text-white">{{ $item['publish'] }}</div>
                <a href="{{ url('/'. $item['slug']) }}" class="footer_post pb-4">
                    {{$item['judul']}}
                </a>
                @endforeach

            </div>
        </div>
    </div>

</div>