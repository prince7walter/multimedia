@extends('layouts.admin')

@section('content')
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Envoie de SMS</h3>
        <div class="row mt">
            <div class="col-md-3"></div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h4 class="title">SMS</h4>
                <div id="message"></div>
                <form class="contact-form php-mail-form" role="form" action="{{route('sms.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="2" class="form-control">
                    <div class="form-group">
                        <input type="text" name="object" class="form-control" id="contact-objet" placeholder="Objet" data-rule="minlen:4" data-msg="Veuillez saisir au moins  caractères du sujet">
                        <div class="validate"></div>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="corps" id="contact-message" placeholder="Votre Message" rows="5" data-rule="required" data-msg="SVP écrivez quelque chose " ></textarea>
                        <div class="validate"></div>
                    </div>

                    <div class="loading"></div>
                    <div class="error-message"></div>
                    <div class="sent-message">Votre message a été envoyé. Merci !</div>

                    <div class="form-send">
                        <button type="submit" class="btn btn-large btn-primary">Envoyer Message</button>
                    </div>

                </form>
            </div>


        </div>
        <!-- /row -->


        <!-- /row -->
    </section>
@endsection
