<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">
					<img src="/img/profile.jpg" alt="user photo" class="avatar-img rounded-circle">
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span>
							
							<span class="user-level"></span>
							<span class="caret"></span>
						</span>
					</a>
					<div class="clearfix"></div>
					<div class="collapse in" id="collapseExample">
						<ul class="nav">
							<li>
								<a href="#profile">
									<span class="link-collapse">My Profile</span>
								</a>
							</li>
							<li>
								<a href="#edit">
									<span class="link-collapse">Edit Profile</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<ul class="nav nav-primary">
				<li class="nav-item active">
					<a data-toggle="collapse" href="{{url('/home')}}" class="collapsed" aria-expanded="false">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#submenu">
						<i class="fas fa-cogs"></i>
						<p>General Settings</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="submenu">
						<ul class="nav nav-collapse">
							<li>
								<a data-toggle="collapse" href="#subnav1">
									<i class="fas fa-address-card"></i>
									<p>Address Settings</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="subnav1">
									<ul class="nav nav-collapse subnav">
										<li>
											<a href="{{url('/countries')}}">
												<span class="sub-item">Country</span>
											</a>
										</li>
										<li>
											<a href="{{url('/cities')}}">
												<span class="sub-item">City</span>
											</a>
										</li>
										<li>
											<a href="{{url('/thanas')}}">
												<span class="sub-item">Thana</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li>
								<a data-toggle="collapse" href="#subnav3">
									<i class="fas fa-building"></i>
									<p>House Settings</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="subnav3">
									<ul class="nav nav-collapse subnav">
										<li>
											<a href="{{url('/houses')}}">
												<span class="sub-item">House Information</span>
											</a>
										</li>
										<li>
											<a href="{{url('/apartments')}}">
												<span class="sub-item">Apartment Info.</span>
											</a>
										</li>
										<li>
											<a href="{{url('/shops')}}">
												<span class="sub-item">Shop Information</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li>
								<a data-toggle="collapse" href="#subnav2">
									<i class="fas fa-hand-holding-usd"></i>
									<p>Billing Settings</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="subnav2">
									<ul class="nav nav-collapse subnav">
										<li>
											<a href="{{url('/billtypes')}}">
												<span class="sub-item">Bill Type</span>
											</a>
										</li>
										<li>
											<a href="{{url('/electric_bills')}}">
												<span class="sub-item">Electric Bill</span>
											</a>
										</li>
										<li>
											<a href="">
												<span class="sub-item">Gas Bill</span>
											</a>
										</li>
										<li>
											<a href="">
												<span class="sub-item">Water Bill</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li>
								<a data-toggle="collapse" href="#subnav4">
									<i class="fas fa-users-cog"></i>
									<p>Renter Settings</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="subnav4">
									<ul class="nav nav-collapse subnav">
										<li>
											<a href="{{url('/rentertypes')}}">
												<span class="sub-item">Renter Type</span>
											</a>
										</li>
									</ul>
								</div>
							</li>	
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#sidebarLayouts">
						<i class="fas fa-users"></i>
						<p>Renter or Client</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="sidebarLayouts">
						<ul class="nav nav-collapse">
							<li>
								<a href="{{url('/renters')}}">
									<span class="sub-item">Renter Information</span>
								</a>
							</li>
							<li>
								<a href="{{url('/renters')}}">
									<span class="sub-item">Active Renters</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#maps">
						<i class="fas fa-money-bill-alt"></i>
						<p>Advance Payment</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="maps">
						<ul class="nav nav-collapse">
							<li>
								<a href="{{url('/advance_payments')}}">
									<span class="sub-item">Payments</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#forms">
						<i class="fas fa-file-invoice"></i>
						<p>Generate Invoice</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="forms">
						<ul class="nav nav-collapse">
							<li>
								<a href="forms/forms.html">
									<span class="sub-item">Create Invoice</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#tables">
						<i class="fas fa-file-pdf"></i>
						<p>Reports</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="tables">
						<ul class="nav nav-collapse">
							<li>
								<a href="tables/tables.html">
									<span class="sub-item">Rent Collection Report</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- End Sidebar -->