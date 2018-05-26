@extends('layouts.app')
@section('content')


<h2>{{ __('medical_imaging_analytics.Medical Imaging Analytics') }}</h2>
<hr>
<div class="container-fluid">
<h3> <span class="label label-primary">MItalytics I</span></h3>

<div class="container-fluid">
		<h4>	{{ __('medical_imaging_analytics.Body 1') }} 
</h4>	


<div class="row">
  <div class="col-xs-6 col-md-6">
	<div class="container-fluid bg-info" >
			<h4> {{ __('medical_imaging_analytics.Main List 1')}}</h4>
			<ul style = 'list-style-type: circle;'>
				<li> {!! __('medical_imaging_analytics.Sub List 1-1', ['New'=>'<strong>New</strong>','新'=>'<strong>新</strong>'])!!}</li>
				<li>{!! __('medical_imaging_analytics.Sub List 1-2',['Comprehensive'=>'<strong>Comprehensive</strong>','全面'=>'<strong>全面</strong>'])!!} </li>
				<li>{!! __('medical_imaging_analytics.Sub List 1-3',['Fast'=>'<strong>Fast</strong>','高效'=>'<strong>高效</strong>'])!!}</li>

			</ul>
	</div>
  </div>
  
  <div class="col-xs-6 col-md-6">
	<div class="container-fluid bg-info" >
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
</div>

<hr>

<h3> <span class="label label-primary">MItalytics II</span></h3>

<div class="container-fluid">
		<h4>	Some other product of Fitpu
</h4>	
</div>


</div>


  @endsection

@section('content_more')

  
@endsection