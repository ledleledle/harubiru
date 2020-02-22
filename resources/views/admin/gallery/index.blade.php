@extends('admin-template.page')
@section('title', 'Gallery')
@section('activegallery', 'active')
@section('active_g_lists', 'active')
@section('content')
<!-- Page Heading -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Gallery</h1>
		</div>
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						@if (session('status'))
						<div class="alert alert-success" role="alert">
							{{ session('status') }}
						</div>
						@endif
						<div class="card-header py-3">
							<a href="{{ route('webmanager.gallery.create') }}" class="btn btn-sm btn-primary btn-icon btn-icon-left">
								<span class="icon text-white-50">
									<i class="fas fa-flag"></i>
								</span>
								<span class="text">Add Photo</span>
							</a>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped table-hover" id="table-1">
									<thead>
										<tr>
											<th width="5%" class="text-center">#</th>
											<th>Caption</th>
											<th width="15%" class="text-center">Thumbnail</th>
											<th width="10%" class="text-center">Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th width="5%" class="text-center">#</th>
											<th class="text-center">Caption</th>
											<th width="15%" class="text-center">Thumbnail</th>
											<th width="10%" class="text-center">Action</th>
										</tr>
									</tfoot>
									<tbody>
										@foreach ($gallery as $result => $print)
										<tr>
											<td align="center">{{ $result + $gallery->firstitem() }}</td>
											<td>{{ $print->caption }}</td>
											<td><img style="max-width: 90px; margin-left: 20%" src="{{ asset($print->url) }}"></td>
											<td align="center">
												<form method="POST" action="{{ route('webmanager.gallery.destroy', $print->id) }}">
													@csrf
													@method('delete')
													<a href="{{ route('webmanager.gallery.edit', $print->id) }}" class="btn btn-sm btn-warning btn-icon">
														<span class="icon text-white-50">
															<i class="fas fa-edit"></i>
														</span>
													</a>
													<button type="submit" class="btn btn-sm btn-danger btn-icon">
														<span class="icon text-white-50">
															<i class="fas fa-trash"></i>
														</span>
													</button>
												</form>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection