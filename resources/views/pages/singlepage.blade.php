@extends('layouts.inner')
@section('content')
  <section class="hero-wrap hero-wrap-2" style="background-image: url('/inteccardgroup/theme1/images/bg_1.jpg')" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-0 text-center">
            <h1 class="mb-3 bread">{{$page->name}}</h1>
          </div>
        </div>
      </div>
  </section>

  <section class="ftco-section">
			<div class="container">
				<div class="row">
					<div class="col-md-12 wrap-about">
	          <div class="heading-section pr-md-5">
            {!!$page->long_desc!!}
	          </div>
					</div>
				</div>
			</div>
  </section>
@stop