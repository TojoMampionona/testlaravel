@extends('layouts.admin.master')

@section('title')User Cards
 {{ $title }}
@endsection

@push('css')
@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>User Cards</h3>
		@endslot
		<li class="breadcrumb-item">Users</li>
		<li class="breadcrumb-item active">User Cards</li>
	@endcomponent
	
	<div class="container-fluid user-card">
	    <div class="row">
			@foreach($utilisateurs as $utilisateur)
				<div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
					<div class="card custom-card">
						<div class="card-header"><img class="img-fluid custom-card-image" src="{{asset('/'. $utilisateur->img_pdc)}}" alt="" /></div>
						<div class="card-profile"><img class="rounded-circle pdp" src="{{asset('/'. $utilisateur->img_pdp)}}" alt="" /></div>
						<ul class="card-social">
							<li>
								<a href="javascript:void(0)"><i class="fa fa-facebook"></i></a>
							</li>
							<li>
								<a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a>
							</li>
							<li>
								<a href="javascript:void(0)"><i class="fa fa-twitter"></i></a>
							</li>
							<li>
								<a href="javascript:void(0)"><i class="fa fa-instagram"></i></a>
							</li>
							<li>
								<a href="javascript:void(0)"><i class="fa fa-rss"></i></a>
							</li>
						</ul>
						<div class="text-center profile-details">
							<a href="#"> <h4>{{ $utilisateur->nom }} {{ $utilisateur->prenom }}</h4></a>
							<h6>{{ $utilisateur->service }}</h6>
						</div>
						<div class="card-footer row">
							<div class="col-4 col-sm-4">
								<a class="btn btn-pill btn-outline-success btn-xs" type="button" href="{{ route('edit-profile', ['id_utilisateur' => $utilisateur->id_utilisateur]) }}" style="font-size:14px">Détails</a>
							</div>
							<div class="col-4 col-sm-4">
								<form action="{{ route('utilisateur.destroy', $utilisateur->id_utilisateur) }}" method="post">
									@csrf
									@method('DELETE')
									<button type="button" class="btn btn-pill btn-outline-primary btn-xs" data-bs-toggle="modal" data-bs-target="#modalDelete{{$utilisateur->id_utilisateur}}" style="font-size:14px">
										Supprimer
									</button>
									<div class="modal fade" id="modalDelete{{$utilisateur->id_utilisateur}}" tabindex="-1" aria-labellebdy="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<p>Voulez-vous vraiment supprimer {{ $utilisateur->nom }} {{ $utilisateur->prenom }}</p>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
													<button type="submit" class="btn btn-primary" >Oui</button>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div class="col-4 col-sm-4">
								<form action="{{ route('toggle-lock', ['id_utilisateur' => $utilisateur->id_utilisateur]) }}" method="post">
									@csrf
									<button class="btn btn-pill btn-outline-danger  btn-xs" type="submit" style="font-size:14px">{{$utilisateur->locked ? 'Débloquer' : 'Bloquer'}}</button>
								</form>
							</div>
						</div>
					</div>
	        	</div>
@endforeach
	    </div>
	</div>
	
	@push('scripts')
		
	@endpush

@endsection