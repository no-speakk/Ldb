@component('admin.master')
	@slot('title')Menu_1 @endslot
	@slot('breadcrumb')
		{{------------------------------------------ Breadcrumb ---------------------------------------------}}
		<li class="breadcrumb-item"><a href="{{-- {{ route('inventory') }} --}}">Menu_1</a></li>
		<li class="breadcrumb-item active">Submenu_1</li>
	@endslot
	@slot("custom_css")
		<style></style>
	@endslot


	<div class="rows text-left" dir="ltr">
		<div class="col-md-12">
			{{------------------------------------------ form ---------------------------------------------}}
			<form id="form_A" role="form" class="form-horizontal" action="{{-- {{ route('create') }} --}}" method="POST">
				@method("POST")
				@csrf
				<div class="card card-primary">
					<div class="card-header text-center">
						<h3 class="card-title">Form Something</h3>
					</div>
					<div class="card-body">
						{{------------------------------------------ inputs -----------------------------------------}}
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>input A</label>
									<input name="input_A" type="text" class="form-control" placeholder="value...">
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label>input B</label>
									<input name="input_B" type="text" class="form-control" placeholder="value...">
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label>input C</label>
									<input name="input_C" type="text" class="form-control" placeholder="value...">
								</div>
							</div>
						</div>
						{{------------------------------------------ inputs END -------------------------------------}}

						{{------------------------------------- Validation Errors -----------------------------------}}
						@if ($errors->any())
							<div class="alert alert-danger mt-3 pl-5">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						{{--------------------------------- Validation Errors End -----------------------------------}}
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Submit Form</button>
					</div>
				</div>
			</form>
			{{-------------------------------------------- form End ------------------------------------------------}}
		</div>
	</div>



	{{------------------------------------------------------ JS ----------------------------------------------------}}
	@slot("custom_js")
		<script>
			$(document).ready(function () {
				//
			});
		</script>
	@endslot
@endcomponent
