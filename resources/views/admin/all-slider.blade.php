@extends('admin.dashboard')	
@section('content')

<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{url('/all-slider')}}}l">All Sliders</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Data Table</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Sliders</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Slider ID</th>
								  <th>Slider Image</th>
								  <th>Slider Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  @foreach($allSliderInfo as $slider)   
						  <tbody>
							<tr>
								<td>{{$slider->sliderId}}</td>
								<td class="center"><img src="{{ asset($slider->sliderImage) }}" style="height:100px; width:200px" /></td>
								<td class="center">
									@if ($slider->sliderStatus=='published')
										<span class="label label-success">{{$slider->sliderStatus}}</span>
									@else
										<span class="label label-danger">{{$slider->sliderStatus}}</span>
									@endif	
								</td>
								<td class="center">
									@if($slider->sliderStatus=='published')
										<a class="btn btn-danger" title="change status" href="{{url('/unpublished-slider/'. $slider->sliderId)}}">
											<i class="halflings-icon white thumbs-down"></i>  
										</a>
									@else
										<a class="btn btn-success" title="change status" href="{{url('/published-slider/'. $slider->sliderId)}}">
											<i class="halflings-icon white thumbs-up"></i>  
										</a>
									@endif
									
									<a class="btn btn-danger" title="delete" href="{{url('/delete-slider/'. $slider->sliderId)}}" onclick="return confirm('Are you sure you want to delete this row of records?');" >
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							
							
						  </tbody>
						  @endforeach
					  	</table>            
					</div>
				</div><!--/span-->
			</div><!--/row-->
</div>
@endsection