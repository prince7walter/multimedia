@extends('layouts.admin')

@section('content')
    <?php
    $classe = \Illuminate\Support\Facades\DB::table('classes')->select('*')->get();
    ?>

    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Gestionnaire des emails</h3>
        <!-- page start-->
        <div class="row mt">
            <div class="col-sm-3">
                <section class="panel">
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked mail-nav">
                            <li ><a href="{{route('mail.index')}}"> <i class="fa fa-inbox"></i>
                                    Messages envoyés </a></li>
                            <li class="active"><a href="{{route('mail.create')}}"> <i class="fa fa-envelope-o"></i> Envoyez Mail</a></li>
                        </ul>
                    </div>
                </section>

            </div>
            <div class="col-sm-9">
                <section class="panel">
                    <header class="panel-heading wht-bg">
                        <h4 class="gen-case">
                            Nouveau message
                        </h4>
                    </header>
                    <div class="panel-body">
                        <div class="compose-mail">
                            <form role="form-horizontal" action="{{route('mail.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="to" class="">À:</label>
                                    <select name="classe" class="form-control">
                                        @foreach($classe as $test):
                                            <option value="{{$test->id_class}}">{{$test->libelle}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="subject" class="">Object:</label>
                                    <input type="text" name="object" tabindex="1" id="subject" class="form-control">
                                </div>
                                <div class="compose-editor">
                                    <textarea class="wysihtml5 form-control" name="corps" rows="9"></textarea>
                                </div>
                                <div class="compose-btn">
                                    <button class="btn btn-theme btn-sm" type="submit"><i class="fa fa-check"></i> Envoyer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
