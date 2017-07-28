app.controller("image", function($scope, $http) {

  getImageAttrList();

  $scope.newImageAttr = function(){

    if($scope.attribute != "" && $scope.section != "" && $scope.attribute != undefined && $scope.section != undefined){

      if($scope.attribute.indexOf(' ') != -1){

        $scope.message = "Attribute must not contain space/s. Use underscore '_' instead.";

      }
      else{

        $scope.message = "Checking for existing attribute...";

        var q = new Query($http, 'tbl_image_attr');
        q.where = ["attribute = ?", [$scope.attribute]];
        q.select(function(response){

          if(response.length == 0){

            $scope.message = "Adding attribute...";
            var q = new Query($http, 'tbl_image_attr');
            q.attribute = $scope.attribute;
            q.section   = $scope.section;
            q.save(function(){
              
              $scope.message   = "";
              $scope.attribute = "";
              $scope.section   = "";

              getImageAttrList();
              swal("Success!", "Attribute successfully saved!", "success");

            });

          }
          else{
            
            $scope.message = "Attribute already exists.";

          }

        });

      }

    }
    else{

      $scope.message = "Fill in all fields.";

    }

  } 

  function getImageAttrList(){

    var q = new Query($http, 'tbl_image_attr');
    q.columns = ["id", "attribute", "section"];
    q.select(function(response){

      $scope.attributeList = response;

      for(var i = 0; i < response.length; i++){

        response[i].action = 
        '<button class="btn btn-flat btn-success"'+'onclick="editAttribute('+"'"+i+"'"+')"'+' >Edit</button>'
        +'<button class="btn btn-flat btn-danger"'+'onclick="deleteAttribute('+"'"+response[i].id+"'"+')"'+'>Delete</button>';

      }

      $('#attributeTable').dataTable({
        
        "aoColumnDefs": [{ "bVisible": false, "aTargets": [0] }],
        "bDestroy": true,
        "aaData" : response,
        "aoColumns": [
            { "mDataProp": "id" },
            { "mDataProp": "attribute" },
            { "mDataProp": "section" },
            { "mDataProp": "action" }
        ]

      });
    
    });

  }

  $scope.deleteAttribute = function(attrId){
      
      var q = new Query($http, "tbl_image_attr");
      q.where = ["id = ?", [attrId]];
      q.delete(function(){

        getImageAttrList();
        swal("Success!", "Attribute successfully deleted!", "success");

      });

      var q = new Query($http, "tbl_translation");
      q.where = ["attribute_id = ?", [attrId]];
      q.delete();

    }

    $scope.editAttribute = function(index){
      
      $('#editAttribute').val($scope.attributeList[index].attribute);
      $('#editSection').val($scope.attributeList[index].section);
      $('#editAttrId').val($scope.attributeList[index].id);
      $('#editIndex').val(index);
      $('#attributeModal').modal("show");
      $scope.editSection = "aaa";

    }

    $scope.updateAttribute = function(){

      if($('#editAttribute').val() == "" || $('#editSection').val() == "" || $('#editAttrId').val() == ""){

        $scope.editAttrMessage = "Fill in all fields.";

      }
      else{

        if($('#editAttribute').val().indexOf(' ') != -1){

          $scope.editAttrMessage = "Attribute must not contain space/s. Use underscore '_' instead.";

        }
        else{ 

          if($scope.attributeList[$('#editIndex').val()].attribute.toLowerCase() == $('#editAttribute').val().toLowerCase()){
            
            $scope.editAttrMessage = "Updating attribute...";

            if($scope.attributeList[$('#editIndex').val()].attribute == $('#editAttribute').val() && $scope.attributeList[$('#editIndex').val()].section == $('#editSection').val()){

              $scope.editAttrMessage = "";
              $('#attributeModal').modal("hide");
              swal("Success!", "Attribute successfully updated!", "success");

            }
            else{

              var q = new Query($http, "tbl_image_attr");
              q.where     = ["id = ?", [$('#editAttrId').val()]];
              q.attribute = $('#editAttribute').val();
              q.section   = $('#editSection').val();
              q.save(function(){

                getImageAttrList();
                $scope.editAttrMessage = "";
                $('#attributeModal').modal("hide");
                swal("Success!", "Attribute successfully updated!", "success");

              });
              
            }

          }
          else{
            
            $scope.editAttrMessage = "Checking for existing attribute...";

            var q = new Query($http, "tbl_image_attr");
            q.where = ["attribute = ?", [$('#editAttribute').val()]];
            q.select(function(response){

              if(response.length == 0){

                var q = new Query($http, "tbl_image_attr");
                q.where     = ["id = ?", [$('#editAttrId').val()]];
                q.attribute = $('#editAttribute').val();
                q.section   = $('#editSection').val();
                q.save(function(){

                  getImageAttrList();
                  $scope.editAttrMessage = "";
                  $('#attributeModal').modal("hide");
                  swal("Success!", "Attribute successfully updated!", "success");

                });

              }
              else{

                $scope.editAttrMessage = "Attribute already exists.";

              }

            });

          }
          
        }

      }

    }

});


function deleteAttribute(attrId){
  
  swAlert("Are you sure?", "Are you sure you want to delete this attribute?", "warning", function(){
    angular.element($('#image')).scope().deleteAttribute(attrId);
  });
  
}

function editAttribute(index){

  angular.element($('#image')).scope().editAttribute(index);

}