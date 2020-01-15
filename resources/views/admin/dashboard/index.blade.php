<!-- Card With Icon States Color -->
<div class="row">
	<div class="col-sm-6 col-md-6">
		<div class="card card-stats card-round">
			<div class="card-body ">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="flaticon-users text-danger"></i>
						</div>
					</div>
					<div class="col-7 col-stats">
						<div class="numbers">
							<strong><p class="card-category">Number of Registered Renters</p></strong>
							<h4 class="card-title">{{ App\Model\Renter::all()->count() }}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-6">
		<div class="card card-stats card-round">
			<div class="card-body ">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="flaticon-user-6 text-success"></i>
						</div>
					</div>
					<div class="col-7 col-stats">
						<div class="numbers">
							<strong><p class="card-category">Number of Active Renters</p></strong>
							<h4 class="card-title">{{ App\Model\ActiveRenter::all()->count() }}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-6 col-md-6">
		<div class="card card-stats card-round">
			<div class="card-body">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="flaticon-coins text-success"></i>
						</div>
					</div>
					<div class="col-7 col-stats">
						<div class="numbers">
							<strong><p class="card-category">Total Collections</p></strong>
							<h4 class="card-title">৳ 0.00</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-6">
		<div class="card card-stats card-round">
			<div class="card-body">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="flaticon-clock text-success"></i>
						</div>
					</div>
					<div class="col-7 col-stats">
						<div class="numbers">
							<strong><p class="card-category">Collection of this Month</p></strong>
							<h4 class="card-title">৳ 0.00</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-6 col-md-4">
		<div class="card card-stats card-round card-pricing2">
			<div class="card-body ">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="flaticon-coins text-danger"></i>
						</div>
					</div>
					<div class="col-7 col-stats">
						<div class="numbers">
							<strong><p class="card-category">Due Collection</p></strong>
							<h4 class="card-title">৳ 0.00</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-4">
		<div class="card card-stats card-round">
			<div class="card-body ">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="flaticon-home text-success"></i>
						</div>
					</div>
					<div class="col-7 col-stats">
						<div class="numbers">
							<strong><p class="card-category">Number of Complexes</p></strong>
							<h4 class="card-title">{{ App\Model\Apartment::all()->count() }}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-4">
		<div class="card card-stats card-round">
			<div class="card-body">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="flaticon-box-3 text-info"></i>
						</div>
					</div>
					<div class="col-7 col-stats">
						<div class="numbers">
							<strong><p class="card-category">Number of Shops</p></strong>
							<h4 class="card-title">{{ App\Model\Shop::all()->count() }}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>