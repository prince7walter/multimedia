@extends('layouts.admin')

@section('content')
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Gestionnaire des emails</h3>
        <!-- page start-->
        <div class="row mt">
            <div class="col-sm-3">
                <section class="panel">
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked mail-nav">
                            <li class="active"><a href="{{route('mail.index')}}"> <i class="fa fa-inbox"></i>
                                    Messages envoyés </a></li>
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
                                    @foreach($mesg as $send)
                                        <tr>
                                            <td class="inbox-small-cells">
                                                <form action="{{route('mail.destroy', $send->id_mesg)}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                                </form>
                                            </td>
                                            <td class="view-message ">{{$send->destinataire}}</a></td>
                                            <td class="view-message ">{{$send->object}}</a></td>
                                            <td class="view-message  inbox-small-cells"><i class="fa fa-check"></i></td>
                                            <td class="view-message  text-right">{{$send->created_at}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
