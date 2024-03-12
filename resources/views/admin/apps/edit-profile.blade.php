@extends('layouts.admin.master')

@section('title')Edit Profile
 {{ $title }}
@endsection

@push('css')
@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>Edit Profile</h3>
		@endslot
		<li class="breadcrumb-item">Users</li>
		<li class="breadcrumb-item active">Edit Profile</li>
	@endcomponent
	@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
	@endif
	
	<div class="container-fluid">
	    <div class="edit-profile">
	        <div class="row">
	            <div class="col-xl-4">
	                <div class="card">
	                    <div class="card-header pb-0">
	                        <h4 class="card-title mb-0">My Profile</h4>
	                        <div class="card-options">
	                            <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
	                        </div>
	                    </div>
	                    <div class="card-body">
	                        <form>
	                            <div class="row mb-2">
	                                <div class="profile-title">
	                                    <div class="media">
	                                        <img class="img-70 rounded-circle" alt="" src="{{asset('/'. $utilisateur->img_pdp)}}" />
	                                        <div class="media-body">
	                                            <h3 class="mb-1 f-20 txt-primary nom_utilisateur">{{ $utilisateur->nom }} </h3>
												<h4 class="mb-1 f-20 txt-primary prenom_utilisateur"> {{ $utilisateur->prenom }}</h4>
	                                            <p class="f-12 nom_service">{{ $utilisateur->service }}</p>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="mb-3">
	                                <h6 class="form-label">Bio</h6>
	                                <textarea class="form-control biographie" rows="5" disabled>{{ $utilisateur->biographie }}</textarea>
	                            </div>
	                            <div class="mb-3">
	                                <label class="form-label">Email-Address</label>
	                                <input class="form-control mail" placeholder="your-email@domain.com" value="{{ $utilisateur->email }}" disabled/>
	                            </div>
	                        </form>
	                    </div>
	                </div>
	            </div>
	            <div class="col-xl-8">
	                <form method="POST" id="formEditProfile" action="{{ route ('update-profile', ['id_utilisateur' => $utilisateur->id_utilisateur]) }}" enctype="multipart/form-data" class="card">
                    @csrf
					@method('PUT')
	                    <div class="card-header pb-0">
	                        <h4 class="card-title mb-0">Données du profil</h4>
	                        <div class="card-options">
	                            <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a>
	                        </div>
	                    </div>
	                    <div class="card-body">
	                        <div class="row">
	                            <div class="col-sm-6 col-md-4">
	                                <div class="mb-3">
	                                    <label class="form-label">Nom de famille</label>
										<input class="form-control edit_nom" type="text" name="lastname" placeholder="Nom" value="{{ $utilisateur->nom }}" required/>
	                                </div>
	                            </div>
								<div class="col-sm-6 col-md-4">
	                                <div class="mb-3">
	                                    <label class="form-label">Prénom</label>
	                                    <input class="form-control edit_prenom" type="text" name="firstname" placeholder="Prénom" value="{{ $utilisateur->prenom }}" required/>
	                                </div>
	                            </div>
								<div class="col-sm-6 col-md-4">
	                                <div class="mb-3">
	                                    <label class="form-label">Email address</label>
	                                    <input class="form-control edit_email" type="email" name="email" placeholder="Email" value="{{ $utilisateur->email }}"/>
	                                </div>
	                            </div>
								<div class="col-sm-4 col-md-4">
	                                <div class="mb-3">
	                                    <label class="form-label">Poste</label>
	                                    <select class="form-control edit_service" name="service">
											@foreach($listeDesServices as $service)
												<option value="{{ $service->libelle }}">{{ $service->libelle }}</option>
											@endforeach
										</select>
	                                </div>
	                            </div>
	                            <div class="col-sm-4 col-md-4">
	                                <div class="mb-3">
	                                    <label class="form-label">Actif</label>
                                        <select class="form-control" name="actif" required>
                                            <option value="1" {{ $utilisateur->actif == 1 ? 'selected' : '' }}>Oui</option>
                                            <option value="0" {{ $utilisateur->actif == 0 ? 'selected' : '' }}>Non</option>
                                        </select>
	                                </div>
	                            </div>
                                <div class="col-sm-4 col-md-4">
	                                <div class="mb-3">
	                                    <label class="form-label">PWD</label>
	                                    <input class="form-control" type="password" name="pwd" value="{{ $utilisateur->pwd }}" required/>
	                                </div>
	                            </div>
	                            <div class="col-sm-6 col-md-6">
	                                <div class="mb-3">
	                                    <label class="form-label">Date d'insértion</label>
	                                    <input class="form-control" type="date" name="date_d_ajout" value="{{ $utilisateur->date_insertion}}" />
	                                </div>
	                            </div>
	                            <div class="col-sm-6 col-md-6">
	                                <div class="mb-3">
	                                    <label class="form-label">Locked</label><br />
	                                    <input class="form-check-input" type="checkbox" name="locked" value="1" {{ $utilisateur->locked == 1 ? 'checked' : '' }}>
	                                </div>
	                            </div>
								<div class="col-sm-6 col-md-6">
	                                <div class="mb-3">
	                                    <label for="img_pdp" class="form-label">Image de profil</label>
										@if($utilisateur->img_pdp)
										<p>Nom de votre image de profil: {{$utilisateur->img_pdp}}</p>
										@else
										<p>Aucune image de profil actuelle.</p>
										@endif
        								<input type="file" class="form-control" id="img_pdp" name="img_pdp" accept="image/jpeg,image/png,image/jpg,image/gif">
										<small id="img_pdp_error" class="text-danger"></small>
	                                </div>
	                            </div>
								<div class="col-sm-6 col-md-6">
	                                <div class="mb-3">
	                                    <label for="img_pdc" class="form-label">Image de couverture</label>
										@if($utilisateur->img_pdc)
										<p>Nom de votre image de couverture: {{$utilisateur->img_pdc}}</p>
										@else
										<p>Aucune image de couverture actuelle.</p>
										@endif
        								<input type="file" class="form-control" id="img_pdc" name="img_pdc" accept="image/jpeg,image/png,image/jpg,image/gif">
										<small id="img_pdc_error" class="text-danger"></small>
	                                </div>
	                            </div>
								<div class="col-md-12 mt-3">
	                                <div>
	                                    <label class="form-label">Biographie</label>
	                                    <textarea class="form-control edit_bio" rows="5" name="biographie" placeholder="Ajouter votre biographie" >{{ $utilisateur->biographie }}</textarea>
	                                </div>
	                            </div>
	                            <div class="col-md-12">
	                                <div>
	                                    <label class="form-label">Commentaire</label>
	                                    <textarea class="form-control" rows="5" name="commentaire" placeholder="Ajouter du commentaire sur cet utilisateur" >{{ $utilisateur->commentaire }}</textarea>
	                                </div>
	                            </div>
                                <div class="col-md-12 mt-3">
	                                <div>
	                                    <label class="form-label">Date d'activation</label>
	                                    <input class="form-control" type="date" name="date_d_activation" value="{{ $utilisateur->date_locked }}"/>
	                                </div>
	                            </div>
                                <div class="col-4 mt-3">
                                    <div class="mb-3">
                                        <label class="form-label">Droit d'accès</label>
										<select class="form-control" name="id_droitacces">
											@foreach($listeDesDroitsAcces as $droitacces)
												<option value="{{ $utilisateur->id_droitacces }}" {{ $utilisateur->id_droitacces == $droitacces->id_droitacces ? 'selected' : '' }}>{{ $droitacces->libelle }}</option>
											@endforeach
										</select>
                                    </div>
                                </div>
                                
	                        </div>
	                    </div>
	                    <div class="card-footer text-end">
	                        <button class="btn btn-primary" type="submit">Modifier</button>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>

	
	@push('scripts')
		<script src="{{asset('assets/js/monscript.js')}}"></script>
		<script src="{{asset('assets/js/imageUploaded.js')}}"></script>
	@endpush

@endsection