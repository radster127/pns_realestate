@include('layouts.header')
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" ng-app="pns" ng-controller="image" id="image">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Language Attributes
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
          <div class="box-header with-border">
            <h3 class="box-title">Add Image Attributes</h3>
          </div>
          <div class="box-body">
           
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <input type="textbox" class="form-control" placeholder="Attribute... (use undesrcore '_' instead od space, ex. sample_attribute)" ng-model="attribute">
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <textarea class="form-control" placeholder="Section..." ng-model="section"></textarea>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-6 col-md-offset-2" ng-bind="message"></div>
              <div class="col-md-2">
                <button class="btn btn-flat" style="width: 100%" ng-click="newImageAttr()">Add</button>
              </div>
            </div>
            <br>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            
          </div>
          <div class="box-body">
            <table id="attributeTable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Attribute</th>
                  <th>Section</th>
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
  <div id="attributeModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Language Attribute</h4>
        </div>
        <div class="modal-body">
      
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="sectionPreview">Attribute</label>
                <input class="form-control" placeholder="Attribute... (use undesrcore '_' instead od space, ex. sample_attribute)" id="editAttribute">
                <input class="hidden" id="editAttrId">
                <input class="hidden" id="editIndex">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="sectionTranslation">Section</label>
                <textarea class="form-control" id="editSection" placeholder="Section..."></textarea>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <div class="col-md-9  text-left" ng-bind="editAttrMessage"></div>
          <button type="button" class="btn btn-primary" ng-click="updateAttribute()">Submit</button>
        </div>
      </div>

    </div>
  </div>
  <!-- end of modal -->
  <script src="angular/angular.min.js"></script>
  <script src="angular/angularApp.js"></script>
  <script src="angular/angularConnect.js"></script>
  <script src="angular/image_ctrl.js"></script>
</div>
<!-- /.content-wrapper -->

@include('layouts.footer')
@include('layouts.scripts')
