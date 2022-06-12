@extends('layouts.main')

@section('css')
    <link href="{{ asset('assets/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
	
    <div class="row layout-top-spacing">

	<div class="col-md-7 layout-spacing">

	    <div class="widget widget-activity-four">

	        <div class="widget-heading">
	            <h5 class="">Application List</h5>
	        </div>

	        <div class="widget-content">

	        	<div class="row">
		        	@foreach ($applications as $app)
		        	<div class="col-md-2">		        		
			        	<div class="logo-app">
				        	<a href="" target="_blank">
				        		<div style="display: flex; justify-content: center;">
					        		<img src="{{ asset('assets/square-logo-no-text.png') }}" class="img-fluid">
					        	</div>

				        		<h5 class="center">{{ $app->application }}</h5>
				        	</a>
			        	</div>
		        	</div>
		        	@endforeach


	        	</div>

	            <div class="tm-action-btn" style="padding-top: 30px;">
	                <a class="" href="{{ route('applications') }}">
	                	<strong>View All</strong> 
	                	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
	                </a>
	            </div>
	        </div>
	    </div>
	</div>

	<div class="col-md-5 layout-spacing">
		<div class="widget widget-activity-four">
			<div class="widget-heading">
				<h5 class="">Approval List</h5>
			</div>

			<div class="widget-content">

				<div class="table-responsive">
					<table class="table table-scroll">
						<thead>
							<tr>
								<th><div class="th-content">Application</div></th>
								<th><div class="th-content">Approver</div></th>
								<th><div class="th-content">Request Code</div></th>
								<th><div class="th-content">Status</div></th>
							</tr>
						</thead>
						<tbody>
							@foreach($approvals as $app)
							<tr>
								<td><div class="td-content">{{ $app->approval->application->application }}</div></td>
								<td><div class="td-content">{{ $app->employee->person->name }}</div></td>
								<td><div class="td-content">
									@if (!$isAdmin)
										<a href="" target="_blank" style="color: blue; font-weight: bold; text-decoration: underline;">{{ $app->request_code }}</a>
									@else
										{{ $app->request_code }}
									@endif
								</div></td>
								<td><div class="td-content">{{ $app->status }}</div></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				
				<div class="tm-action-btn">
	                <a class="" href="{{ route('approvals') }}">
	                	<span>View All</span> 
	                	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
	                </a>
	            </div>
			</div>
		</div>
	</div>

	@hasrole('admin')
	<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

	    <div class="widget widget-table-one">

	        <div class="widget-heading">
	            <h5 class="">Manage User</h5>
	        </div>

	        <div class="widget-content">

	        	@foreach ($users as $user)
	        		@php
	        			$fullname = $user->person->name;

	        			$explode = explode(' ', $fullname);
	        			$initials = implode('', array_map(function ($name) { 
					        preg_match_all('/\b\w/', $name, $matches);
					        return implode('', $matches[0]);
					    }, $explode));
	        		@endphp

		        	<div class="transactions-list t-info">
	                    <div class="t-item">
	                        <div class="t-company-name">
	                            <div class="t-icon">
	                                <div class="avatar avatar-xl">
	                                    <span class="avatar-title">{{ substr($initials, 0, 2) }}</span>
	                                </div>
	                            </div>
	                            <div class="t-name">
	                                <h4>{{ $fullname }}</h4>
	                                <p class="meta-date">Ditambahkan {{ tanggal(date('Y-m-d', strtotime($user->created_at))) }}</p>
	                            </div>
	                        </div>
	                        <div class="t-rate rate-inc">
	                            <p><span>{{ $user->person->employee->nip }}</span></p>
	                        </div>
	                    </div>
	                </div>
	        	@endforeach

	            <div class="center">
	                <a class="" href="{{ route('users') }}">
	                	<strong>View All</strong> 
	                	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
	                </a>
	            </div>
	        </div>
	    </div>
	</div>

	<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

	    <div class="widget widget-activity-four">

	        <div class="widget-heading">
	            <h5 class="">Manage Employee</h5>
	        </div>

	        <div class="widget-content">

	            <div class="tm-action-btn">
	                <button class="btn">
	                	<span>View All</span>
		                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
	            	</button>
	            </div>
	        </div>
	    </div>
	</div>

	<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

	    <div class="widget widget-activity-four">

	        <div class="widget-heading">
	            <h5 class="">Manage Organization</h5>
	        </div>

	        <div class="widget-content">

	            <div class="tm-action-btn">
	                <button class="btn">
	                	<span>View All</span>
		                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
	            	</button>
	            </div>
	        </div>
	    </div>
	</div>

	<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">

	    <div class="widget widget-activity-four">

	        <div class="widget-heading">
	            <h5 class="">Manage Position</h5>
	        </div>

	        <div class="widget-content">

	            <div class="tm-action-btn">
	                <button class="btn">
	                	<span>View All</span>
		                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
	            	</button>
	            </div>
	        </div>
	    </div>
	</div>
	@endrole
	</div>
@endsection

@section('javascript')
<!-- <script src="{{ asset('assets/plugins/apex/apexcharts.min.js') }}"></script> -->
<script src="{{ asset('assets/assets/js/dashboard/dash_2.js') }}"></script>
@endsection