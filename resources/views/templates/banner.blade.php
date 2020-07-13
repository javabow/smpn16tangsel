<!-- Start Banner
============================================= -->

<div class="banner-area transparent-nav banner-search content-top-heading bg-fixed text-light text-normal text-center" style="background-image: url('{{asset('img/header.jpg')}}')">
    <!-- <video autoplay muted loop class="video-fix">
        <source src="#">
    </video> -->
    <div class="item">
        <div class="box-table shadow dark bg-home">
            <div class="box-cell">
                <div class="container">

                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="content">
                                <h1 class="sma1">SMPN 16 Tangerang Selatan</h1>
                                <form action="{{ url('berita') }}" method="GET">
                                    <input type="text" placeholder="{{ $sText->{'cariApa'.Session::get('lang')} }}" class="form-control" name="search">
                                    <button type="submit">
                                        {{ $sText->{'cari'.Session::get('lang')} }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
