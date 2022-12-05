@extends('admin.sidebar')
@section('title', "Création d'un fleur")

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nouvel fleur</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Créer un fleur</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="{{ route('fleur.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col col-6">
                        <label for="inputName">Nom</label>
                        <input  style="border: 1px solid black;" type="text" id="inputName" class="form-control @error('name') is-danger @enderror" name="name" value="{{ old('name') }}">
                        @error('name')
                          <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    
                    </div>
                    <div class="col col-6">
                        <label for="inputName">Prix</label>
                        <input  style="border: 1px solid black;" type="text" id="inputName" class="form-control @error('price') is-danger @enderror" name="price" value="{{ old('price') }}">
                        @error('price')
                          <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    
                    </div>
                   
                   
                    <div class="col col-6">
                        <label for="inputClientCompany">Image de la fleur</label>
                        <input style="border: 1px solid black;" type="file" id="inputClientCompany" class="form-control @error('photo') is-danger @enderror" name="photo" value="{{ old('photo') }}">
                        @error('photo')
                          <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputDescription">Description</label>
                    <textarea style="border: 1px solid black;" id="inputDescription" class="form-control @error('description') is-danger @enderror" rows="4" name="description">{{ old('description') }}</textarea>
                    @error('description')
                      <p class="help is-danger">{{ $message }}</p>
                    @enderror
                </div>
              
                <div class="row">
                  <div class="col-6">
                    <a class="btn btn-primary m-1" href="{{ route('fleur.index') }}" role="button"><i class="fas fa-arrow-alt-circle-left"> Retour</i></a>
                  </div>
                  <div class="col-6">
                    <button type="submit" class="btn btn-success float-right m-1">Créer un fleur</button>
                  </div>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
     </form>

    </section>
</div>
@endsection