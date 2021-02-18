@component('admin.master')
	@slot('title')منو۱@endslot
	@slot('breadcrumb')
		<li class="breadcrumb-item"><a href="{{ route('inventory') }}">منو۱</a></li>
		<li class="breadcrumb-item active">زیرمنو۱</li>
	@endslot
	@slot('custom_css')
		<style></style>
	@endslot
	<div class="card text-left" dir="ltr">
		<div class="card-header">
			<h3 class="card-title pull-right">لیست اطلاعات</h3>
			{{------------------------------------- Search ----------------------------------------}}
			<div class="card-tools d-flex">
				<form action="">
					<div class="input-group input-group-sm" style="width: 150px;">
						<input type="text" name="search" class="form-control float-right" placeholder="جستجو" value="{{ request('search') }}">
						<div class="input-group-append">
							<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
						</div>
					</div>
				</form>
			</div>
			{{------------------------------------- Search END ----------------------------------------}}
		</div>
		<div class="card-body table-responsive p-0">
			{{------------------------------------- Table ----------------------------------------}}
			<table class="table table-hover table-bordered">
				<tbody>
				{{------------------------------------- Table Headers ----------------------------------------}}
				<tr class="text-center">
					<th>Col 1</th>
					<th>Col 2</th>
					<th>Action</th>
				</tr>
				{{------------------------------------- Table Rows ----------------------------------------}}
				{{--			@foreach($datass as $data)--}}
				<tr>
					<td>{{-- {{ $data->col_1 }} --}}</td>
					<td>{{-- {{ $data->col_2 }} --}}</td>
					<td class="d-flex">
						<a href="#" class="btn btn-sm btn-primary">Approve</a>
						<form action="#" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-sm btn-danger ml-1">Reject</button>
						</form>
						<a href="#" class="btn btn-sm btn-warning ml-1">Needed edit</a>
					</td>
				</tr>
				{{--			@endforeach--}}
				</tbody>
			</table>
		</div>
		<div class="card-footer">
			{{-- {{ $datas->appends('search', request('search'))->links() }} --}}
		</div>
	</div>


	{{------------------------------------------------- JS ---------------------------------------------------------}}
	@slot('custom_js')
		<script>
			$(document).ready(function () {
				//
			});
		</script>
	@endslot
@endcomponent