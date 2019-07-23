@extends('admin.dashboard')	
@section('content')

<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{url('/add-product')}}">Add Product</a>
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
						<form class="form-horizontal" action="{{url('/save-product')}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						  <fieldset>
							

						  	<div class="control-group">
								<label for="abc" class="control-label">Category Name</label>
								<div class="controls">
									<select class="form-control" name="categoryId">
                        				<option>Select Category</option>
                        			
										<?php $allCategories=DB::table('categories')
                                                ->where('categoryStatus','published')
                                                ->get();
                            			foreach($allCategories as $allCategory){ ?>
                      				
                        				<option value="{{$allCategory->categoryId}}">{{ $allCategory->categoryName}} </option>
                        			
                        			<?php }?>
                        			</select>
                    			</div>
							</div>

							<div class="control-group">
								<label for="abc" class="control-label">Brand Name</label>
								<div class="controls">
                      				<select class="form-control" name="brandId">
                        				<option>Select Brand</option>
                        			
										<?php $allBrands=DB::table('brands')
                                                ->where('brandStatus','published')
                                                ->get();
                            			foreach($allBrands as $allBrand){ ?>
                      				
                        				<option value="{{$allBrand->brandId}}">{{ $allBrand->brandName}} </option>
                        			
                        			<?php }?>
                        			</select>
                    			</div>
							</div>

							<div class="control-group">
							  <label class="control-label">Product Name</label>
							  <div class="controls">
								<input type="text"  name="productName" value="" required="">
							  </div>
							</div>        
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Short Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="productShortDescription"  rows="3" required=""></textarea>
							  </div>
							</div>
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Long Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="productLongDescription"  rows="5" required=""></textarea>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label">Product Price</label>
							  <div class="controls">
								<input type="number"  name="productPrice" value="" required="">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label">Product Image</label>
							  <div class="controls">
								<input type="file"  name="productImage" value="" required="">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label">Product Size</label>
							  <div class="controls">
								<input type="text"  name="productSize" value="" required="">
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status</label>
							  <div class="controls">
								<input type="checkbox"  name="productStatus" value="published" />Published <br/>
								<input type="checkbox"  name="productStatus" value="unpublished" />Unpublished
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Product</button>
							  
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

			

</div>

@endsection