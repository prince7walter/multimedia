@extends('layouts.admin')

@section('content')
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Envoie de SMS</h3>
        <div class="row mt">
            <div class="col-md-3"></div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <section class="panel">
                    <header class="panel-heading wht-bg">
                        <h4 class="gen-case">
                            Nouveau message
                        </h4>
                    </header>
                    <div class="panel-body">
                        <div class="compose-mail"></div>
                        <form role="form-horizontal" action="{{route('message',$etud->id_pers)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="subject" class="">Object:</label>
                                <input type="text" name="object" tabindex="1" id="subject" class="form-control">
                            </div>
                            <div class="compose-editor">
                                <textarea class="wysihtml5 form-control" name="corps" rows="9"></textarea>
                            </div>
                            <div class="compose-btn" style="align: center;">
                                <button class="btn btn-theme btn-sm" type="submit"><i class="fa fa-check"></i> Envoyer</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>


        </div>
        <!-- /row -->


        <!-- /row -->
    </section>
@endsection
