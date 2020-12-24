<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
  <!-- Bootstrap core CSS -->
    <link href="{{asset('css/admin/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/admin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/admin/js/bootstrap.min.css')}}" rel="stylesheet">
  <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
</head>
<body>

  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Admin Area</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class=""><a href="/admin/games">Games</a></li>
          <li><a href="../steamAdmin/pages.blade.php">Pages</a></li>
          <li><a href="http://127.0.0.1:8000/admin/news">News</a></li>
          <li><a href="/admin/users">Users</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Welcome, Admin</a></li>
          <li><a href="../steamAdmin/login.blade.php">Logout</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

  <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Dashboard <small> Manage your site. ADMIN </small></h1>
        </div>
      </div>
    </div>
  </header>
  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="active">Dashboard</li>
      </ol>
    </div>
  </section>

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="list-group">
              <a href="/admin/games" class="list-group-item active main-color-bg">
                  <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Overview
              </a>

              <a href="/admin/createGameForm" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Add game </a>
              <a href="/admin/createNewsForm" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Add news </a>
              <a href="/admin/" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Edit <span class="badge">129</span></a>
              <a href="/admin/users" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class="badge">129</span></a>
              <a href="#" class="list-group-item">
                  <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Analytics <span class="badge">15</span></a>
          </div>

          <div class="well">
            <h4>Disk Space Used</h4>
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                70%
              </div>
            </div>
            <h4>Bandwidth Used </h4>
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                30%
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <!-- Website Overview -->
          <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Website Overview</h3>
            </div>
            <div class="panel-body">
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> </h2>
                  <h4>Users</h4>
                </div>
              </div>
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> </h2>
                  <h4>News</h4>
                </div>
              </div>
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </h2>
                  <h4>Games</h4>
                </div>
              </div>
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span></h2>
                  <h4>Visitors</h4>
                </div>
              </div>
            </div>
          </div>

          <!-- Latest Users -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Dashboard</h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-hover">
                  @yield('body')

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>






 <footer id = "footer">
    <p> copyrigh Admin Area, &copy; 2020 </p>

 </footer>


    <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="css/admin/js/bootstrap.min.js"></script>
    </body>
    </html>
