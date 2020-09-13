@extends('layouts.inner')
@section('content')
<!-- banner -->
<section class="banner_inner" id="home">
	<div class="banner_inner_overlay">
	</div>
</section>
<!-- //banner -->

<!-- tour packages -->
<section class="packages pt-5">
	<div class="container py-lg-4 py-sm-3">
		<h2 class="heading text-capitalize text-center">การประชุมคณะกรรมการพัฒนาการท่องเที่ยว ประจำเขตพัฒนาการท่องเที่ยวฝั่งทะเลตะวันตก ครั้งที่ 1/2562</h2>
		<p class="text mt-2 mb-5 text-center">&nbsp;</p>
		<div class="row">
			@foreach ($news as $new)
				<div class="col-lg-3 col-sm-6 mb-5">
					<div class="image-tour position-relative">
					<img src="{{$new->image}}" alt="" class="img-fluid" />
					</div>
					<div class="package-info">
					<h5 class="my-2">{{$new->name}}</h5>
						<ul class="listing mt-3">
						<li><span class="fa fa-download mr-2"></span><a href="@if ($new->link) {{$new->link}} @else {{$new->attachment}} @endif" target="_blank">ดูรายละเอียด</a></li>
						</ul>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>
<!-- tour packages -->
@stop