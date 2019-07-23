@extends('admin.dashboard')
@section('content')

<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{url('/view-order')}}}l">Order Details</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Data Table</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Customer Details</h2>
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
								  
								  <th>Customer Name</th>
								  <th>Customer Phone</th>
							  </tr>
						  </thead>
						  <!--@foreach($orderDetailById as $od)-->   
						  <tbody>
							<tr>
								<td class="center">{{$od->customerName}}</td>
								<td class="center">{{$od->customerPhone}}</td>
							</tr>
						  </tbody>
						 <!--@endforeach-->
					  	</table>            
					</div>
				</div><!--/span-->
			</div><!--/row-->
</div>
<!--end of customer info table-->

<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{url('/view-order')}}}l">Order Details</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Data Table</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Order Details</h2>
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
								  <th>Order Detail ID</th>
								  <th>Order ID</th>
								  <th>Prduct ID</th>
								  <th>Product Name</th>
								  <th>Price per unit</th>
								  <th>Ordered Qty</th>
								  <th>Total</th>
								  
							  </tr>
						  </thead>
						  @foreach($orderDetailById as $od)   
						  <tbody>
							<tr>
								<td class="center">{{$od->orderDetailsId}}</td>
								<td class="center">{{$od->orderId}}</td>
								<td class="center">{{$od->productId}}</td>
								<td class="center">{{$od->productName}}</td>
								<td class="center">.BDT {{$od->productPrice}}</td>
								<td class="center">{{$od->productQuantity}}</td>
								<td class="center">.BDT {{$od->productPrice * $od->productQuantity}}</td>
							</tr>
							@endforeach
						  </tbody>
						  <tfoot>
						  	<tr>
						  		<td colspan="6">Grand Total: </td>
						  		<td><strong>.BDT {{$od->orderTotal}}</strong></td>
						  	</tr>
						  </tfoot>
					  	</table>
					  	            
					</div>
				</div><!--/span-->
			</div><!--/row-->
</div>
<!--orders detail end-->

<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{url('/view-order')}}}l">Order Details</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Data Table</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Shipping Details</h2>
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
								  
								  <th>Shipping To</th>
								  <th>Email</th>
								  <th>Address</th>
								  <th>Phone</th>
								  <th>City</th>
								  
							  </tr>
						  </thead>
						  @foreach($orderDetailById as $od)   
						  <tbody>
							<tr>
								<td class="center">{{$od->shipName}}</td>
								<td class="center">{{$od->shipEmail}}</td>
								<td class="center">{{$od->shipAddress}}</td>
								<td class="center">{{$od->shipPhone}}</td>
								
								<td class="center">{{$od->shipCity}}</td>
							</tr>
						  </tbody>
						  @endforeach
					  	</table>            
					</div>
				</div><!--/span-->
			</div><!--/row-->
</div>
@endsection