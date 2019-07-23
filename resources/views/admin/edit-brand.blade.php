@extends('admin.dashboard')	
@section('content')

<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{url('/edit-brand')}}">Edit Brand</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Form</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<p class="alert-success">
						<?php 
						$message=Session::get('message');
						if($message){
							echo $message;
							Session::put('message',NULL);
							}
						?>
						
						
					</p>
					<div class="box-content">
						<form class="form-horizontal" action="{{url('/update-brand', $brandInfo->brandId)}}" method="post">
						{{csrf_field()}}
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label">Brand Name</label>
							  <div class="controls">
								<input type="text"  name="brandName" value="{{$brandInfo->brandName}}" required="">
							  </div>
							</div>        
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Brand Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="brandDescription"  rows="5" required=""> {{$brandInfo->brandDescription}} </textarea>
							  </div>
							</div>
							<!--<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status</label>
							  <div class="controls">
								<input type="checkbox"  name="brandStatus" value="published" />Published <br/>
								<input type="checkbox"  name="brandStatus" value="unpublished" />Unpublished
							  </div>
							</div>-->
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update Brand</button>
							  
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

			

</div>

@endsection