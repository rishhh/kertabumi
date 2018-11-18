@if(Auth::guard('web')->check())
	<p class="text-success">
		<STRONG>Admin</STRONG> is Logged in
	</p>
@else
	<p class="text-danger">
		<STRONG>Admin</STRONG> is Logged out
	</p>
@endif

@if(Auth::guard('customer')->check())
	<p class="text-success">
		<STRONG>Customer</STRONG> is Logged in
	</p>
@else
	<p class="text-danger">
		<STRONG>Customer</STRONG> is Logged out
	</p>
@endif

@if(Auth::guard('adminstok')->check())
	<p class="text-success">
		<STRONG>Adminstok</STRONG> is Logged in
	</p>
@else
	<p class="text-danger">
		<STRONG>Adminstok</STRONG> is Logged out
	</p>
@endif