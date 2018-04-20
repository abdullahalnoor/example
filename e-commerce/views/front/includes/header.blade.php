<div class="header_top">
  <div class="container">
  	<div class="header_top-box">
     <div class="header-top-left">
			  <div class="box">
			  	   	<select tabindex="4" class="dropdown drop">
					   <option value="" class="label" value="">Dollar :</option>
				       <option value="1">Dollar</option>
				       <option value="2">Euro</option>
					</select>
   			   </div>
   			   <div class="box1">
   				       <select tabindex="4" class="dropdown">
							<option value="" class="label" value="">English :</option>
							<option value="1">English</option>
							<option value="2">French</option>
							<option value="3">German</option>
					  </select>
   			   </div>
   				    <div class="clearfix"></div>
   			 </div>
			 <div class="cssmenu">
				<ul>
					<li class="active"><a href="login.html">Account</a></li> 
					<li><a href="wishlist.html">Wishlist</a></li>
					@if(Session::get('customerId'))
						<li><a href="{{ url('/customer-logout') }}">Logout</a></li>
					@else
						<li><a href="login.html">Log In</a></li>
						<li><a href="register.html">Sign Up</a></li>
					@endif
				</ul>
			</div>
			<div class="clearfix"></div>
   </div>
</div>
</div>
<div class="header_bottom">
	<div class="container">
	 <div class="header_bottom-box">
		<div class="header_bottom_left">
			<div class="logo">
				<a href="{{ url('/') }}"><img src="{{ asset('/front') }}/images/logo.png" alt=""/></a>
			</div>
			<ul class="clock">
				<i class="clock_icon"> </i>
				<li class="clock_desc">Justo 24/h</li>
			</ul>
			<div class="clearfix"> </div>
		</div>
		<div class="header_bottom_right">
			<div class="search">
			  <input type="text" value="Your email address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your email address';}">
			  <input type="submit" value="">
	  		</div>
	  		<ul class="bag">
	  			<a href="{{ url('/show-cart') }}"><i class="bag_left"> </i></a>
	  			<a href="#"><li class="bag_right"><p>TK.{{ Session::get('grandTotal') }}</p></li></a>
	  			<div class="clearfix"> </div>
	  		</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
</div>
<div class="menu">
	<div class="container">
		<div class="menu_box">
	     <ul class="megamenu skyblue">
			<li class="active grid"><a class="color2" href="{{ url('/') }}">Home</a></li>
			@foreach($categories as $category)
			 <li><a class="color4" href="{{ url('/category-product/'.$category->id) }}">{{ $category->category_name }}</a></li>
			@endforeach
			<div class="clearfix"> </div>
		 </ul>
	  </div>
</div>
</div>
