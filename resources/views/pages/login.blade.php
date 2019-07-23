@extends('welcome')
@section('content')
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="{{url('/customer-login')}}" method="post">
							{{csrf_field()}}
							<input type="email" placeholder="Email Address" name="customerEmail"  required="" />
							<input type="password" placeholder="Password"  name="customerPassword" required="" />

							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
			</div><br/>
			<div class="row">	
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-8">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{url('/customer-registration')}}" method="post">
							{{csrf_field()}}
							<input type="text" placeholder="Name" name="customerName" required=""/>
							<input type="email" placeholder="Email Address" name="customerEmail" required=""/>
							<input type="password" placeholder="Password" name="customerPassword" required=""/>
							<input type="number" placeholder="Phone Number" name="customerPhone" required=""/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection