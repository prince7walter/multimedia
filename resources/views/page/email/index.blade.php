@extends('layouts.admin')

@section('content')
    <section class="wrapper">
        <!-- page start-->
        <div class="row mt">
            <div class="col-sm-3">
                <section class="panel">
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked mail-nav">
                            <li class="active"><a href="{{route('mail.index')}}"> <i class="fa fa-inbox"></i>
                                    Boite de réception </a></li>
                            <li><a href="{{route('mail.create')}}"> <i class="fa fa-envelope-o"></i> Envoyez Mail</a></li>
                        </ul>
                    </div>
                </section>
            </div>
            <div class="col-sm-9">
                <section class="panel">
                    <header class="panel-heading wht-bg">
                        <h4 class="gen-case">
                            Inbox
                        </h4>
                    </header>
                    <div class="panel-body minimal">
                        <div class="table-inbox-wrap ">
                            <table class="table table-inbox table-hover">
                                <tbody>
                                <tr>
                                    <td class="inbox-small-cells">
                                        <i class="fa fa-delicious"></i>
                                    </td>
                                    <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                                    <td class="view-message  dont-show"><a href="mail_view.html">Google Inc.</a></td>
                                    <td class="view-message "><a href="mail_view.html">Your new account is ready.</a></td>
                                    <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                                    <td class="view-message  text-right">08:10 AM</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
