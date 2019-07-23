@extends('welcome')
@section('content')
<section id="cart_items">
		<div class="container">
			

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-8 clearfix">
						<div class="bill-to">
							<p>Shipping Information</p>
							<div class="form-one">
								<form action="{{url('/save-shipping-detail')}}" method="post">
								{{csrf_field()}}
									<input type="text" placeholder="Name" name="shipName" required="">
									<input type="email" placeholder="Email" name="shipEmail" required="">
									<input type="text" placeholder="Address" name="shipAddress" required="">
									<input type="number" placeholder="Phone Number" name="shipPhone" required="">
									<input type="text" placeholder="City" name="shipCity" required="">
									<input type="submit" class="btn btn-block" placeholder="City">
								</form>
							</div>
							
									
							
						</div>
					</div>
							
				</div>
			</div>
			

			
			
		</div>
	</section> <!--/#cart_items-->
@endsection