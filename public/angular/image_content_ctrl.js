app.controller("image_content", function($scope, $http) {
    
    getImageAttrList();

    function getImageAttrList(id){

      var q = new Query($http, 'tbl_image_attr');
      q.leftJoin= ["tbl_images", ["id", "attribute_id"]];
      q.columns = [["id", "section"], ["image_name"]];
      q.select(function(response){

        $scope.sectionList = response;

        var data = []; 
        checker = [];
        for(var i = 0; i < response.length; i++){

          if(!isRepeated(response[i].a_id)){

            response[i].action = '<button class="btn btn-flat btn-success"'+'onclick="viewImage('+"'"+i+"'"+')"'+' >View Image</button>';
            data.push(response[i]);

          }
          

        }
        


        $('#attributeTable').dataTable({
          
          "aoColumnDefs": [
            { "bVisible": false, "aTargets": [0] },
            { "bVisible": false, "aTargets": [2] }
          ],
          "bDestroy": true,
          "aaData" : data,
          "aoColumns": [
              { "mDataProp": "a_id" },
              { "mDataProp": "a_section" },
              { "mDataProp": "b_image_name"},
              { "mDataProp": "action"}
          ]

        });
        
        if(id != null){

        var modalImages = [];
        
        for(var i = 0; i < $scope.sectionList.length; i++){

            if($scope.sectionList[i].a_id == id){

              modalImages.push({image_name: "images/"+$scope.sectionList[i].b_image_name});

            }
          
          }

          $scope.modalImages = modalImages;

        }

      });

    }

    $scope.viewImage = function(index){

      $('#sectionPreview').html($scope.sectionList[index].a_section);
      $('#attributeId').val($scope.sectionList[index].a_id);

      if($scope.sectionList[index].b_image_name == null){
        $('#previewImage').attr('src', "images/no-image.jpg");
      }
      else{
        $('#previewImage').attr('src', "images/"+$scope.sectionList[index].b_image_name);
      }

      var modalImages = [];
      for(var i = 0; i < $scope.sectionList.length; i++){

        if($scope.sectionList[i].a_id == $scope.sectionList[index].a_id){

          modalImages.push({image_name: "images/"+$scope.sectionList[i].b_image_name});

        }
      
      }

      $scope.modalImages = modalImages;
      $scope.$apply();
      $('#imageModal').modal('show');
      
    }

    $scope.focusImage = function(imageName){

      $('#previewImage').attr('src', imageName);

    }

    $scope.deleteImage = function(){

      swAlert("Are you sure?", "Are you sure you want to delete this image?", "warning", function(){
        
        var image_name    = $('#previewImage').attr('src').split('/')[1];
        
        var q = new Query($http, "tbl_images");
        q.where = ["attribute_id = ? AND image_name = ?", [$('#attributeId').val(), image_name]];
        q.delete(function(){

          var modalImages = [];
          var sectionList = [];
          for(var i = 0; i < $scope.modalImages.length; i++){

            if($scope.modalImages[i].image_name != "images/"+image_name){
              
              modalImages.push({image_name: $scope.modalImages[i].image_name});

            }
          
          }
          var x = 0;
          for(var i = 0; i < $scope.sectionList.length; i++){
            
            if($scope.sectionList[i].a_id == $('#attributeId').val() && $scope.sectionList[i].b_image_name == image_name){
              

            }
            else{

              console.log("enbter");
              sectionList[x] = $scope.sectionList[i]; 
              x++;

            }
          
          }

          $scope.sectionList = sectionList;
          $scope.modalImages = modalImages;
          $('#previewImage').attr('src', modalImages[0].image_name);
          swal("Success!", "Image successfully deleted!", "success");

        });

      });

    }

    $scope.newImage = function(){

      $('#message').html("Saving translation...");

      var q = new Query($http, 'tbl_images');
      q.attribute_id = $('#attributeId').val();
      q.image_name   = q.file($('#imageFile'));
      q.path         = "images";
      q.save(function(){

        getImageAttrList($('#attributeId').val());

        $('#message').html("");
        $('#imageFile').val("");
        swal("Success!", "Image successfully saved!", "success");

      });
    
    }

    var isRepeated = function(id){
      
      var flag    = false;
      for(var i = 0; i < checker.length; i++){

        if(checker[i] == id){
          flag = true;
        }

      }
      
      if(!flag){
        checker.push(id); 
        return false;
      }
      else{
        return true;
      }

    }

    $scope.uploadOption = function(){

      swal({
        title: "Choose where to upload from.",
        text: "Where do you want to upload from?",
        type: "info",
        showCancelButton: true,
        confirmButtonColor: "rgb(140, 212, 245)",
        confirmButtonText: "Storage",
        cancelButtonText: "Device",
        closeOnConfirm: true,
        closeOnCancel: false
      },
      function(isConfirm){
        if (isConfirm) {
          
          $http.get('/getArchive', {}, jsonConfig)
           .then(
             function(response){ 
              
              console.log(response.data);
              $scope.archiveList = response.data;
              $('#browseImage').modal("show");

             },
             function(){
               alert('fail');
             }
           );

        } else {

          $('#imageFile').click();
          $('#imageFile').change(function(){
            
            swAlert("Are you sure?", "Are you sure you want to upload these images", "info" ,function(){

              $scope.newImage();

            }, true);

          });
          
        }
      });

    }

    var selectedImages = [];

    $scope.checkImage = function(index){

      document.getElementsByClassName('storageImage')[index].style.opacity = "0.3";
      selectedImages.push($scope.archiveList[index].split("images")[1].substring(1, $scope.archiveList[index].split("images")[1].length));

    }

    $scope.uploadFromStorage = function(){

      for(var i = 0; i < selectedImages.length; i++){

        var q = new Query($http, 'tbl_images');
        q.attribute_id = $('#attributeId').val();
        q.image_name   = selectedImages[i];
        q.save(function(){

          getImageAttrList($('#attributeId').val());

          $('#message').html("");
          $('#imageFile').val("");
          $('#browseImage').modal("hide");
          $('#imageModal').modal("show");
          swal("Success!", "Image successfully saved!", "success");
          selectedImages = [];
          $('.storageImage').css('opacity', '');

        });

      }

    }
  
});

function viewImage(index){

  angular.element($('#image_content')).scope().viewImage(index);

}

