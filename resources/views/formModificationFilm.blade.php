@extends('template')

@section('titrePage')
    Modifier un film
@endsection

@section('titreItem')
    <h1>Modifier un film</h1>
@endsection

@section('contenu')
    <div class="col-sm-offset-3 col-sm-6">
        <div class="card">
            <div class="card-header">Modifier un film</div>
            <div class="card-body">
                {!! Form::open(['route' => ['films.update', $film], 'method' => 'PUT']) !!}
                <div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!}">
                    {!! Form::text('titre', $film->titre, ['class' => 'form-control', 'placeholder' => 'Titre du film']) !!}
                    {!! $errors->first('titre', '<small class="help-block text-danger">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('categorie_id') ? 'has-error' : '' !!}">
                    {!! Form::select('categorie_id', $categories, $film->categorie->id, ['class' => 'form-control']) !!}
                    {!! $errors->first('categorie_id', '<small class="help-block text-danger">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                    {!! Form::text('description', $film->description, ['class' => 'form-control', 'placeholder' => 'Description du film']) !!}
                    {!! $errors->first('description', '<small class="help-block text-danger">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('anneeSortie') ? 'has-error' : '' !!}">
                    {!! Form::text('anneeSortie', $film->anneeSortie, ['class' => 'form-control', 'placeholder' => 'Année de sortie du film']) !!}
                    {!! $errors->first('anneeSortie', '<small class="help-block text-danger">:message</small>') !!}
                </div>
                {!! Form::submit('Valider', ['class' => 'btn btn-info pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <p></p>
@endsection
