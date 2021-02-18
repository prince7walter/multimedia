
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Walter&Cycy">
    <title>Manager's Tools - Gestionnaire de mails/sms pour étudiants</title>

    <!-- Favicons -->
    <link href="{{asset('img/favicon.png')}}" rel="icon">
    <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('lib/advanced-datatable/css/demo_page.css')}}" rel="stylesheet" />
    <link href="{{asset('lib/advanced-datatable/css/demo_table.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('lib/advanced-datatable/css/DT_bootstrap.css')}}" />
    <!-- Custom styles for this template -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet">

    <!-- =======================================================
      Template Name: Dashio
      Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
      Author: TemplateMag.com
      License: https://templatemag.com/license/
    ======================================================= -->
</head>

<body>
    <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="{{route('dashbord.index')}}" class="logo"><b>Manager'<span>s Tools</span></b></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
                <!-- settings start -->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                        <i class="fa fa-tasks"></i>
                        <span class="badge bg-theme"></span>
                    </a>
                </li>
                <!-- settings end -->
                <!-- inbox dropdown start-->
                <li id="header_inbox_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-theme"></span>
                    </a>
                </li>
                <!-- inbox dropdown end -->
                <!-- notification dropdown start-->
                <li id="header_notification_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                        <i class="fa fa-bell-o"></i>
                        <span class="badge bg-warning"></span>
                    </a>
                </li>
                <!-- notification dropdown end -->
            </ul>
            <!--  notification end -->
        </div>
        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a class="logout" href="login.html">Se déconnecter</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <p class="centered"><a href="profile.html"><img src="{{asset('img/user.png')}}" class="img-circle" width="80"></a></p>
                <h5 class="centered">Super User</h5>
                <li class="mt">
                    <a class="active" href="{{route('dashbord.index')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Tableau de bord</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="{{route('etudiant.index')}}">
                        <i class="fa fa-desktop"></i>
                        <span>Gestion des étudiants</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="{{route('mail.index')}}">
                        <i class="fa fa-book"></i>
                        <span>Envoyer un mail</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="{{route('sms.index')}}">
                        <i class="fa fa-tasks"></i>
                        <span>Envoyer un SMS</span>
                    </a>
                </li>
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> Gestionnaire des Etudiants</h3>

                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <h4><i class="fa fa-angle-right"></i> Enregistré un étudiant</h4>
                            <form role="form" action="{{route('etudiant.store')}}" method="POST" class="form-horizontal style-form">
                                @csrf
                                <div class="form-group"></div>
                                <div class="form-group">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3">
                                        <input type="text" placeholder="Nom" name="name" class="form-control" style="text-transform: uppercase;" >
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Prénom" name="surname" class="form-control" style="text-transform: uppercase;">
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
                                        <input type="text" placeholder="Matricule" name="matricule" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Email" name="email" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" placeholder="Mobile" name="mobile" class="form-control">
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

                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            <div class="adv-table">
                                <table class="display table-striped table-advance table-hover" id="hidden-table-info" >
                                    <h4><i class="fa fa-angle-right"></i> Liste</h4>
                                    <hr>
                                    <thead>
                                    <tr>
                                        <th> Matricule</th>
                                        <th> Nom</th>
                                        <th > Prénoms</th>
                                        <th> Niveau</th>
                                        <th> Envoyé message</th>
                                        <th> Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>CI0120132466</td>
                                        <td>KESSIE</td>
                                        <td>MAURICE DAVID </td>
                                        <td> Master 2</td>
                                        <td>
                                            <div class="col-md-1"></div>
                                            <button class="btn btn-success btn-xs"><i class="fa fa-send"></i></button>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /content-panel -->
                    </div>
                    <!-- /col-md-12 -->
                </div>


            </section>
        </section>
        <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            <p>
                © Copyrights <strong>MIAGE's LAB</strong>. Tous droits réservés
            </p>
            <a href="blank.html#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->
</section>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript" language="javascript" src="{{asset('lib/advanced-datatable/js/jquery.js')}}"></script>
    <script src="{{asset('lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <script class="include" type="text/javascript" src="{{asset('lib/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('lib/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script type="text/javascript" language="javascript" src="{{asset('lib/advanced-datatable/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('lib/advanced-datatable/js/DT_bootstrap.js')}}"></script>
    <!--common script for all pages-->
    <script src="{{asset('lib/common-scripts.js')}}"></script>
    <!--script for this page-->
    <script type="text/javascript">
        /* Formating function for row details */
        $(document).ready(function() {
            /*
             * Insert a 'details' column to the table
             */
            var nCloneTh = document.createElement('th');
            var nCloneTd = document.createElement('td');
            nCloneTd.className = "center";

            $('#hidden-table-info thead tr').each(function() {
                this.insertBefore(nCloneTh, this.childNodes[0]);
            });

            $('#hidden-table-info tbody tr').each(function() {
                this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
            });
            /*
             * Initialse DataTables, with no sorting on the 'details' column
             */
            var oTable = $('#hidden-table-info').dataTable({
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [0]
                }],
                "aaSorting": [
                    [1, 'asc']
                ]
            });
        });
    </script>
</body>

</html>


