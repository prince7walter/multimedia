@extends('layouts.admin')

@section('content')
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Mise à jour</h3>

        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4><i class="fa fa-angle-right"></i> Modifié des informations de l'étudiant</h4>
                    <form role="form" action="{{route('etudiant.update','$etud->id_pers')}}" method="POST" class="form-horizontal style-form">
                        @csrf
                        @method('PUT')
                        <div class="form-group"></div>
                        <div class="form-group">
                            <div class="col-md-1"></div>
                            <div class="col-md-3">
                                <input type="text" value="{{$etud->nom}}" placeholder="Nom" name="name" class="form-control" style="text-transform: uppercase;" >
                            </div>
                            <div class="col-md-4">
                                <input type="text" value="{{$etud->prenom}}" placeholder="Prénom" name="surname" class="form-control" style="text-transform: uppercase;">
                            </div>
                            <div class="col-md-3">
                                <select name="classe" class="form-control">
                                    <option selected>Niveau</option>
                                    <option>Licence 1</option>
                                    <option>Licence 2</option>
                                    <option>Licence 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-1"></div>
                            <div class="col-md-3">
                                <input type="text" value="{{$etud->matricule}}" placeholder="Matricule" name="matricule" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <input type="text" value="{{$etud->email}}" placeholder="Email" name="email" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <input type="text" value="{{$etud->contact}}" placeholder="Mobile" name="mobile" class="form-control">
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <div class=" col-lg-12">
                                <button class="btn btn-theme btn-lg" type="submit">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /form-panel -->
            </div>
            <!-- /col-lg-12 -->
        </div>
    </section>
@endsection
