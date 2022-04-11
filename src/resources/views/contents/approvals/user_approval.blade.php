@extends('layouts.main')

@section('css')
	<link rel="stylesheet" href="{{ asset('assets/datatables/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/datatables/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
	<div class="seperator-header layout-top-spacing">
        <h4 class=""><a href="">Approve</a></h4>
        <h4 class="" style="color: red; background: rgb(237 6 6 / 46%);"><a href="">Reject</a></h4>
    </div>

    <div class="row layout-top-spacing">
	    <div class="col-md-12">
	    	<div class="card card-primary">

	    		<div class="card-body">
	    			<table id="table" class="table table bordered table-striped">
	    				<thead>
	    					<tr>
								<th class="center"><input type="checkbox" id="checkAll"></div></th>
	    						<th class="center">No</th>
	    						<th class="center">Application</th>
	    						<th class="center">Approver</th>
	    						<th class="center">Request Code</th>
	    						<th class="center">Status</th>
	    					</tr>
	    				</thead>
	    				<tbody>
	    					@php $no = 1 @endphp
	    					@foreach($approvals as $app)
							<tr>
								<td class="center"><input type="checkbox" name="approval[]" value="{{ $app->id }}"></td>
								<td class="center">{{ $no++ }}</td>
								<td><div class="">{{ $app->approval->application->application }}</div></td>
								<td><div class="">{{ $app->employee->person->name }}</div></td>
								<td><div class="center">{{ $app->request_code }}</div></td>
								<td><div class="center">{{ $app->status }}</div></td>
							</tr>
							@endforeach
	    				</tbody>
	    			</table>
	    		</div>
	    	</div>
	    </div>
    </div>
@endsection

@section('javascript')
	<script src="{{ asset('assets/datatables/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/datatables/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('assets/datatables/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('assets/datatables/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $('#table').DataTable();

        $(document).ready(function(){

			// Check/Uncheck ALl
			$('#checkAll').change(function(){
				if($(this).is(':checked')){
					$('input[name="approval[]"]').prop('checked',true);
				}else{
					$('input[name="approval[]"]').each(function(){
						$(this).prop('checked',false);
					});
				}
			});

			// Checkbox click
			$('input[name="approval[]"]').click(function(){
				var total_checkboxes = $('input[name="approval[]"]').length;
				var total_checkboxes_checked = $('input[name="approval[]"]:checked').length;

				if(total_checkboxes_checked == total_checkboxes){
					$('#checkAll').prop('checked',true);
				}else{
					$('#checkAll').prop('checked',false);
				}
			});
		});
    </script>
@endsection