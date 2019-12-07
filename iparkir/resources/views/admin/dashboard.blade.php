@extends('layouts.admin')
@section('title')
Admin Page iParkir | Dashboard
@endsection
@section('title-header')
  Dashboard
@endsection
@section('content')
  <!--Begin::Section-->
  <div class="row">
    <div class="col-xl-4">
      <!--begin:: Widgets/Quick Stats-->
      <div class="row m-row--full-height">
        <div class="col-sm-12 col-md-12 col-lg-6">
          <div class="m-portlet m-portlet--half-height m-portlet--border-bottom-brand ">
            <div class="m-portlet__body">
              <div class="m-widget26">
                <div class="m-widget26__number">
                  {{ count($posts) }}
                  <small>
                    All Posts
                  </small>
                </div>
                <div class="m-widget26__chart" style="height:90px; width: 220px;">
                  <canvas id="m_chart_quick_stats_1"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="m--space-30"></div>
          <div class="m-portlet m-portlet--half-height m-portlet--border-bottom-danger ">
            <div class="m-portlet__body">
              <div class="m-widget26">
                <div class="m-widget26__number">
                  {{ count($pages) }}
                  <small>
                    All Pages
                  </small>
                </div>
                <div class="m-widget26__chart" style="height:90px; width: 220px;">
                  <canvas id="m_chart_quick_stats_2"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6">
          <div class="m-portlet m-portlet--half-height m-portlet--border-bottom-success ">
            <div class="m-portlet__body">
              <div class="m-widget26">
                <div class="m-widget26__number">
                  {{ count($users) }}
                  <small>
                    All Users
                  </small>
                </div>
                <div class="m-widget26__chart" style="height:90px; width: 220px;">
                  <canvas id="m_chart_quick_stats_3"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="m--space-30"></div>
          <div class="m-portlet m-portlet--half-height m-portlet--border-bottom-accent ">
            <div class="m-portlet__body">
              <div class="m-widget26">
                <div class="m-widget26__number">
                  {{ $views }}
                  <small>
                    All Views
                  </small>
                </div>
                <div class="m-widget26__chart" style="height:90px; width: 220px;">
                  <canvas id="m_chart_quick_stats_4"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--end:: Widgets/Quick Stats-->
    </div>
    <div class="col-xl-4">

        <!--begin:: Widgets/Announcements 1-->
        <div class="m-portlet m--bg-accent m-portlet--bordered-semi m-portlet--skin-dark m-portlet--full-height ">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                  My Sticky Note
                </h3>
              </div>
            </div>
            <div class="m-portlet__head-tools">
              <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover">
                  <a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl">
                    <i class="la la-ellipsis-h m--font-light"></i>
                  </a>
                  <div class="m-dropdown__wrapper">
                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                    <div class="m-dropdown__inner">
                      <div class="m-dropdown__body">
                        <div class="m-dropdown__content">
                          <ul class="m-nav">
                            <li class="m-nav__section m-nav__section--first">
                              <span class="m-nav__section-text">
                                Quick Actions
                              </span>
                            </li>
                            <li class="m-nav__item">
                              <a href="{{ url('admin/dashboard/edit-sticky-note') }}" class="m-nav__link">
                                <i class="m-nav__link-icon flaticon-edit"></i>
                                <span class="m-nav__link-text">
                                  Edit
                                </span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="m-portlet__body">
            <!--begin::Widget 7-->
            <div class="m-widget7 m-widget7--skin-dark">
              <div class="m-widget7__desc">
                {{ $stickyNote }}
              </div>
              <div class="m-widget7__user">
                <div class="m-widget7__user-img">
                  <img class="m-widget7__img" src="{{ asset(Auth::user()->dp) }}" alt="">
                </div>
                <div class="m-widget7__info">
                  <span class="m-widget7__username">
                    {{ Auth::user()->name }}
                  </span>
                  <br>
                  <span class="m-widget7__time">
                    {{ Auth::user()->email }}
                  </span>
                </div>
              </div>
            </div>
            <!--end::Widget 7-->
          </div>
        </div>
        <!--end:: Widgets/Announcements 1-->
    </div>
    <div class="col-xl-4">
      <!--begin:: Widgets/Top Products-->
      <div class="m-portlet m-portlet--full-height m-portlet--fit ">
        <div class="m-portlet__head">
          <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
              <h3 class="m-portlet__head-text">
                Top 3 Posts
              </h3>
            </div>
          </div>
        </div>
        <div class="m-portlet__body">
          <!--begin::Widget5-->
          <div class="m-widget4 m-widget4--chart-bottom" style="min-height: 480px">
            @foreach ($top3Article as $key => $value)
              <div class="m-widget4__item">
                <div class="m-widget4__img m-widget4__img--logo">
                  <img src="{{ asset($value->thumbnail) }}" alt="">
                </div>
                <div class="m-widget4__info">
                  <span class="m-widget4__title">
                    {{ $value->{'title'.session('lang')} }}
                  </span>
                  <br>
                  <span class="m-widget4__sub">
                    {{ str_limit(trim(strip_tags($value->{'content'.session('lang')})), 30)  }}
                  </span>
                </div>
                <span class="m-widget4__ext">
                  <span class="m-widget4__number m--font-brand">
                    {{ $value->views }} view
                  </span>
                </span>
              </div>
            @endforeach

            <div class="m-widget4__chart m-portlet-fit--sides m--margin-top-20" style="height:260px;">
              <canvas id="m_chart_trends_stats_2"></canvas>
            </div>
          </div>
          <!--end::Widget 5-->
        </div>
      </div>
      <!--end:: Widgets/Top Products-->
    </div>
  </div>
  <!--End::Section-->
@endsection
