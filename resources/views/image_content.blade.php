@include('layouts.header')
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" ng-app="pns" ng-controller="image_content" id="image_content">
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
                  <th>Image Content</th>
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
  <div id="imageModal" class="modal fade" role="dialog">
    <div class="modal-dialog"> 

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Image Content</h4>
        </div>
        <div class="modal-body">
      
          <div class="row">
            <div class="col-md-9">
              <div class="form-group">
                <label for="sectionPreview">Section:</label><br>
                <span id="sectionPreview" ></span>
                <input class="hidden" id="attributeId">
                {{csrf_field()}}
              </div>
            </div>
            <div class="col-md-3">
              <label for="imageFiles" style="width:100%" class="btn btn-flat btn-warning" ng-click="uploadOption()">Upload Image</label>
              <input class="hidden" type="file" id="imageFile" multiple>
            </div>
          </div>
          <br>
          <div class="row" >
            <div class="col-md-12">
              <div class="focused-image">
                <span class="close" ng-click="deleteImage()">&times;</span>
                <img id="previewImage" style="width: 100%">
              </div>
            </div>
          </div>
          <br>
          <div class="row" style="height:120px; overflow: scroll; overflow-y: hidden">
            <div style="white-space: nowrap">
              <a href="#" ng-repeat="item in modalImages" ng-click="focusImage(item.image_name)">
                <img src="{|item.image_name|}" style="height: 100px; display:inline">
              </a>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <span id="message"></span>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
  <!-- end of modal -->
  <!-- browse image modal -->
  <div id="browseImage" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 90%"> 

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Image Storage</h4>
        </div>
        <div class="modal-body" style="height: 500px; overflow: scroll; overflow-x: hidden">
          
          <div class="row">
            <div class="col-md-9">
              <div class="form-group">
                <input class="hidden" id="attributeId">
                {{csrf_field()}}
              </div>
            </div>
          </div>
          <div class="row">
            <div ng-repeat="item in archiveList">
              <div class="clearfix" ng-if="$index%6 == 0 && $index != 0"></div>
              <br ng-if="$index%6 == 0 && $index != 0">

              <div class="col-md-2">
                <a href="#" ng-click="checkImage($index)">
                  <img src="{|item|}" class="storageImage"  style="width: 100%">
                </a>
              </div>
              
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <span id="message"></span>
          <button type="button" class="btn btn-primary" ng-click="uploadFromStorage()">Upload</button>
        </div>
      </div>

    </div>
  </div>
  <!-- end of modal -->
  <script src="angular/angular.min.js"></script>
  <script src="angular/angularApp.js"></script>
  <script src="angular/angularConnect.js"></script>
  <script src="angular/image_content_ctrl.js"></script>
</div>
<!-- /.content-wrapper -->

@include('layouts.footer')
@include('layouts.scripts')
