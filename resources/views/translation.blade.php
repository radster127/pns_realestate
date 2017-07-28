@include('layouts.header')
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" ng-app="pns" ng-controller="translation" id="translation">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Translation
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
            <table id="attributeTable">
              <thead>
                <tr>
                  <th></th>
                  <th>Section</th>
                  <th></th>
                  <th></th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
  
  <!-- modal -->
  <div id="translationModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Translation</h4>
        </div>
        <div class="modal-body">
      
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="sectionPreview">Section:</label><br>
                <span id="sectionPreview" ></span>
                <input class="hidden" id="attributeId">
                <input class="hidden" id="editIndex">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="sectionTranslation">Japanese</label>
                <textarea class="form-control" id="japTranslation"></textarea>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="sectionTranslation">English</label>
                <textarea class="form-control" id="engTranslation"></textarea>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <span id="message"></span>
          <button type="button" class="btn btn-primary" ng-click="newTranslation()">Submit</button>
        </div>
      </div>

    </div>
  </div>
  <!-- end of modal -->
  <script src="angular/angular.min.js"></script>
  <script src="angular/angularApp.js"></script>
  <script src="angular/angularConnect.js"></script>
  <script src="angular/translation_ctrl.js"></script>
</div>
<!-- /.content-wrapper -->

@include('layouts.footer')
@include('layouts.scripts')
