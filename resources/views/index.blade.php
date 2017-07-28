@include('layouts.header')
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" ng-app="pns" ng-controller="login">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
   
    <!-- Main row -->
    <div class="row">
    <a href="/eng">eng</a>
    <a href="/jap">jap</a>
    <br> <?php echo  addslashes("i say'a dsad") ?>
    <form>
      {{csrf_field()}}
      <input type="file" value="blabla" id="img" multiple>
      <button ng-click="newFile()">dsdsad</button>
    </form>
    {{var_dump($new)}}
    </div>
    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
  <script src="angular/angular.min.js"></script>
  <script src="angular/angularApp.js"></script>
  <script src="angular/angularConnect.js"></script>
  <script src="angular/user_ctrl.js"></script>
</div>
<!-- /.content-wrapper -->

@include('layouts.footer')
@include('layouts.scripts')
