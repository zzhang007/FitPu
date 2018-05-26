@extends('layouts.app')
@section('content')


<h2>{{ __('medical_imaging_analytics.Medical Imaging Analytics') }}</h2>

<div class="row">
  <div class="col-xs-1 col-md-1">
		<h3> <span class="label label-default">MItalytics</span></h3>
  </div>
  <div class="col-xs-10 col-md-10">
		<h5>	{{ __('medical_imaging_analytics.Body 1') }} </h5>
  </div>
</div>

<div class="row">
  <div class="col-xs-6 col-md-6">
	<div class="jumbotron container-fluid" style="margin-top: 2%">
			<h4> {{ __('medical_imaging_analytics.Main List 1')}}</h4>
			<ul style = 'list-style-type: circle;'>
				<li> {!! __('medical_imaging_analytics.Sub List 1-1', ['New'=>'<strong>New</strong>','新'=>'<strong>新</strong>'])!!}</li>
				<li>{!! __('medical_imaging_analytics.Sub List 1-2',['Comprehensive'=>'<strong>Comprehensive</strong>','全面'=>'<strong>全面</strong>'])!!} </li>
				<li>{!! __('medical_imaging_analytics.Sub List 1-3',['Fast'=>'<strong>Fast</strong>','高效'=>'<strong>高效</strong>'])!!}</li>

			</ul>
	</div>
  </div>
  
  <div class="col-xs-6 col-md-6">
	<div class="jumbotron container-fluid" style="margin-top: 2%">
		<h4>{{ __('medical_imaging_analytics.Main List 2')}}</h4>
			<ul style = "list-style-type:circle;">
				<li>{{ __('medical_imaging_analytics.Sub List 2-1')}}</li>
				<li>{{ __('medical_imaging_analytics.Sub List 2-2')}}</li>
				<li>{{ __('medical_imaging_analytics.Sub List 2-3')}}</li>
				<li>{{ __('medical_imaging_analytics.Sub List 2-4')}}</li>
			</ul>	
</div>
  </div>
</div>
  @endsection

@section('content_more')

  
@endsection