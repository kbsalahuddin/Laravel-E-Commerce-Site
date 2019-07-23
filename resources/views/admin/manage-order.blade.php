@extends('admin.dashboard')	
@section('content')

<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{url('/manage-order')}}}l">All Orders</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Data Table</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Orders</h2>
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
								  <th>Order ID</th>
								  <th>Customer Name</th>
								  <th>Ship ID</th>
								  <th>Payment ID</th>
								  <th>Order Total</th>
								  <th>Order Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  @foreach($allOrderInfo as $order)   
						  <tbody>
							<tr>
								<td>{{$order->orderId}}</td>
								<td class="center">{{$order->customerName}}</td>
								<td class="center">{{$order->shipId}}</td>
								<td class="center">{{$order->paymentId}}</td>
								<td class="center">.BDT {{$order->orderTotal}}</td>
								<td class="center">
									@if ($order->orderStatus=='checked')
										<span class="label label-success">{{$order->orderStatus}}</span>
									@else
										<span class="label label-danger">{{$order->orderStatus}}</span>
									@endif	
								</td>
								
								<td class="center">
									@if($order->orderStatus=='checked')
										<a class="btn btn-danger" title="change status" href="{{url('/unchecked-order/'. $order->orderId)}}">
											<i class="halflings-icon white thumbs-down"></i>  
										</a>
									@else
										<a class="btn btn-success" title="change status" href="{{url('/checked-order/'. $order->orderId)}}">
											<i class="halflings-icon white thumbs-up"></i>  
										</a>
									@endif

									<a class="btn btn-info" title="edit" href="{{url('/view-order/'. $order->orderId)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" title="delete" href="{{url('/delete-order/'. $order->orderId)}}" onclick="return confirm('Are you sure you want to delete this row of records?');" >
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