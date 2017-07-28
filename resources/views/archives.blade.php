@include('layouts.header')
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" ng-app="pns" ng-controller="archive" id="archive">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Archive
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
   
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-body">
            
            <div ng-repeat="item in archiveList">
              <div class="clearfix" ng-if="$index%6 == 0 && $index != 0"></div>
              <br ng-if="$index%6 == 0 && $index != 0">

              <div class="col-md-2">
                <a href="#" ng-click="viewImage(item)">
                  <img src="{|item|}" style="width: 100%">
                </a>
              </div>
              
            </div>

          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
  
  <!-- modal -->
  <div id="viewImage" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Image</h4>
        </div>
        <div class="modal-body">
      
          <img id="imagePreview" style="width: 100%">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" ng-click="newTranslation()">Delete</button>
          <button type="button" class="btn btn-primary" ng-click="newTranslation()">Close</button>
        </div>
      </div>

    </div>
  </div>
  <!-- end of modal -->
  <script src="angular/angular.min.js"></script>
  <script src="angular/angularApp.js"></script>
  <script src="angular/angularConnect.js"></script>
  <script src="angular/archive_ctrl.js"></script>
</div>
<!-- /.content-wrapper -->

@include('layouts.footer')
@include('layouts.scripts')
