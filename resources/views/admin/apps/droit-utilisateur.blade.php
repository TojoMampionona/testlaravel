@extends('layouts.admin.master')

@section('title')Edit Profile
 {{ $title }}
@endsection

@push('css')
@endpush

@section('content')
	@component('components.breadcrumb')
		@slot('breadcrumb_title')
			<h3>Droits d'utilisateur</h3>
		@endslot
		<li class="breadcrumb-item">Users</li>
		<li class="breadcrumb-item active">Parametrages</li>
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
	                    <div class="card-header">                            
                            <div>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
                                    Nouveaux droits
                                </button>
                            </div>
                            <!-- modal Création droit -->
                                <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ajouter un droit</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="post" action="{{ route('create-droit') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3 col-md-12 mt-0">
                                                        <label for="con-name">Libellé</label>
                                                        <div class="row">
                                                        <div class="col-sm-6">
                                                            <input class="form-control" name="name_droit" type="text" required="" placeholder="Nom du droit" autocomplete="off">
                                                        </div>
                                                        <div class="col-sm-6">   
                                                            <input class="form-control" name="code" type="text" required="" placeholder="CODE" autocomplete="off">
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                    <button type="submit" class="btn btn-primary">Créer</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <!-- Fin Modal -->
                            <div class="mt-3 mb-3">
                                <i data-feather="users"></i><span class="ms-2">Liste des droits</span>
                            </div>
                            <ul class="list-group list-group-flush">
                                @foreach($droitaccess as $droit)
                                <li class="list-group-item">
                                    <a class="show" data-bs-toggle="modal" data-bs-target="#modalCreate{{ $droit->code }}"><span class="title">{{ $droit->libelle }}</span></a>
                                </li>
                                <!-- debut modal droit access -->
                                <div class="modal fade" id="modalCreate{{ $droit->code }}" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ $droit->libelle }} - {{ $droit->code }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            
                                               
                                                <div class="modal-body">
                                                    <div class="mb-3 col-md-12 mt-0">
                                                        <label for="con-name">Libellé</label>
                                                        <div class="row">
                                                        <div class="col-sm-6">
                                                            <input class="form-control" name="edit_name_droit" type="text" required="" placeholder="Nom du droit" autocomplete="off" value="{{ $droit->libelle }}">
                                                        </div>
                                                        <div class="col-sm-6">   
                                                            <input class="form-control" name="edit_code" type="text" required="" placeholder="CODE" autocomplete="off" value="{{ $droit->code }}">
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('droitacces.destroy', $droit->id_droitacces) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                        <button class="btn btn-primary">Modifier</button>
                                                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Supprimer</button>
                                                    </form>
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- fin modal Droit access -->
                                @endforeach
                            </ul>
	                    </div>
	                </div>
	            </div>
	            <div class="col-xl-8">
	                <p>Hello word</p>
	            </div>
	        </div>
	    </div>
	</div>

	
	@push('scripts')
	@endpush

@endsection