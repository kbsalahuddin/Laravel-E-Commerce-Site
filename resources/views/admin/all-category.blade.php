@extends('admin.dashboard')	
@section('content')

<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{url('/all-category')}}}l">All Categories</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Data Table</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Categories</h2>
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
								  <th>Category ID</th>
								  <th>Cagtegory Name</th>
								  <th>Category Description</th>
								  <th>Category Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  @foreach($allCategoryInfo as $category)   
						  <tbody>
							<tr>
								<td>{{$category->categoryId}}</td>
								<td class="center">{{$category->categoryName}}</td>
								<td class="center">{{$category->categoryDescription}}</td>
								<td class="center">
									@if ($category->categoryStatus=='published')
										<span class="label label-success">{{$category->categoryStatus}}</span>
									@else
										<span class="label label-danger">{{$category->categoryStatus}}</span>
									@endif	
								</td>
								
								<td class="center">
									@if($category->categoryStatus=='published')
										<a class="btn btn-danger" title="change status" href="{{url('/unpublished-category/'. $category->categoryId)}}">
											<i class="halflings-icon white thumbs-down"></i>  
										</a>
									@else
										<a class="btn btn-success" title="change status" href="{{url('/published-category/'. $category->categoryId)}}">
											<i class="halflings-icon white thumbs-up"></i>  
										</a>
									@endif
									<a class="btn btn-info" title="edit" href="{{url('/edit-category/'. $category->categoryId)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" title="delete" href="{{url('/delete-category/'. $category->categoryId)}}" onclick="return confirm('Are you sure you want to delete this row of records?');" >
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