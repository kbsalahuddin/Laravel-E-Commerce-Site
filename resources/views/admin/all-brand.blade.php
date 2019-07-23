@extends('admin.dashboard')	
@section('content')

<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{url('/all-brand')}}}l">All Brands</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Data Table</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Brands</h2>
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
								  <th>Brand ID</th>
								  <th>Brand Name</th>
								  <th>Brand Description</th>
								  <th>Brand Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  @foreach($allBrandInfo as $brand)   
						  <tbody>
							<tr>
								<td>{{$brand->brandId}}</td>
								<td class="center">{{$brand->brandName}}</td>
								<td class="center">{{$brand->brandDescription}}</td>
								<td class="center">
									@if ($brand->brandStatus=='published')
										<span class="label label-success">{{$brand->brandStatus}}</span>
									@else
										<span class="label label-danger">{{$brand->brandStatus}}</span>
									@endif	
								</td>
								
								<td class="center">
									@if($brand->brandStatus=='published')
										<a class="btn btn-danger" title="change status" href="{{url('/unpublished-brand/'. $brand->brandId)}}">
											<i class="halflings-icon white thumbs-down"></i>  
										</a>
									@else
										<a class="btn btn-success" title="change status" href="{{url('/published-brand/'. $brand->brandId)}}">
											<i class="halflings-icon white thumbs-up"></i>  
										</a>
									@endif
									<a class="btn btn-info" title="edit" href="{{url('/edit-brand/'. $brand->brandId)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" title="delete" href="{{url('/delete-brand/'. $brand->brandId)}}" onclick="return confirm('Are you sure you want to delete this row of records?');" >
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