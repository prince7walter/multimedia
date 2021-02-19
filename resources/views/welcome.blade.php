@extends('layouts.admin')

@section('content')
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-9 main-chart">
                    <!--CUSTOM CHART START -->
                    <div class="border-head">
                        <h3> BIENVENUE </h3>
                    </div>
                </div>
                <!-- /col-lg-9 END SECTION MIDDLE -->
                <!-- **********************************************************************************************************************************************************
                    RIGHT SIDEBAR CONTENT
                    *********************************************************************************************************************************************************** -->
                <div class="col-lg-3 ds">
                    <h4 class="centered mt">TEAM SP UNIVERSITÉ DE COCODY</h4>
                    <!-- First Member -->
                    <div class="desc">
                        <div class="thumb">
                            <img class="img-circle" src="img/ui-divya.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                            <p>
                                <a href="#">Daniel KOFFI</a><br/>
                                <muted>d.koffi@gmail.com</muted>
                            </p>
                        </div>
                    </div>
                    <!-- Second Member -->
                    <div class="desc">
                        <div class="thumb">
                            <img class="img-circle" src="img/ui-sherman.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                            <p>
                                <a href="#">Moussa TOURE</a><br/>
                                <muted>toure.mss@live.com</muted>
                            </p>
                        </div>
                    </div>
                    <!-- Third Member -->
                    <div class="desc">
                        <div class="thumb">
                            <img class="img-circle" src="img/ui-danro.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                            <p>
                                <a href="#">Michel DJEJDE</a><br/>
                                <muted>djdj.m21@yahoo.fr</muted>
                            </p>
                        </div>
                    </div>
                    <!-- Fourth Member -->
                    <div class="desc">
                        <div class="thumb">
                            <img class="img-circle" src="img/ui-zac.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                            <p>
                                <a href="#">Alain BILE</a><br/>
                                <muted>alainb@gmail.com</muted>
                            </p>
                        </div>
                    </div>
                    <!-- CALENDAR-->
                    <div id="calendar" class="mb">
                        <div class="panel green-panel no-margin">
                            <div class="panel-body">
                                <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                    <div class="arrow"></div>
                                    <h3 class="popover-title" style="disadding: none;"></h3>
                                    <div id="date-popover-content" class="popover-content"></div>
                                </div>
                                <div id="my-calendar"></div>
                            </div>
                        </div>
                    </div>
                    <!-- / calendar -->
                </div>
                <!-- /col-lg-3 -->
            </div>
            <!-- /row -->
        </section>
@endsection


