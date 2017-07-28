app.controller("translation", function($scope, $http) {

    getAttributeList();

    function getAttributeList(){

      var q = new Query($http, 'tbl_language_attr');
      q.leftJoin= ["tbl_translation", ["id", "attribute_id"]];
      q.columns = [["id", "section"], ["jap_translation", "eng_translation"]];
      q.select(function(response){

        $scope.sectionList = response;
        
        for(var i = 0; i < response.length; i++){

          response[i].action = 
          '<button class="btn btn-flat btn-success"'+'onclick="translation('+"'"+i+"'"+')"'+' >Translation</button>';
          // +'<button class="btn btn-flat btn-danger"'+'onclick="deleteSection('+"'"+response[i].a_id+"'"+')"'+'>Delete</button>';

        }
       
        $('#attributeTable').dataTable({
          
          "aoColumnDefs": [
            { "bVisible": false, "aTargets": [0] },
            { "bVisible": false, "aTargets": [2] },
            { "bVisible": false, "aTargets": [3] },
          ],
          "bDestroy": true,
          "aaData" : response,
          "aoColumns": [
              { "mDataProp": "a_id" },
              { "mDataProp": "a_section" },
              { "mDataProp": "b_jap_translation"},
              { "mDataProp": "b_eng_translation"},
              { "mDataProp": "action"}
          ]

        });
      
      });

    }

    $scope.viewTranslation = function(index){

      $('#sectionPreview').html($scope.sectionList[index].a_section);
      $('#attributeId').val($scope.sectionList[index].a_id);
      $('#japTranslation').val($scope.sectionList[index].b_jap_translation);
      $('#engTranslation').val($scope.sectionList[index].b_eng_translation);
      $('#editIndex').val(index);
      $('#translationModal').modal('show');
      
    }

    $scope.newTranslation = function(){

      if($scope.sectionList[$('#editIndex').val()].b_jap_translation == $('#japTranslation').val() && $scope.sectionList[$('#editIndex').val()].b_eng_translation == $('#engTranslation').val()){
        
        $('#message').html("");
        $('#translationModal').modal("hide");
        swal("Success!", "Translation successfully saved!", "success");

      }
      else{

        $('#message').html("Saving translation...");

        var q = new Query($http, 'tbl_translation');
        q.where        = ["attribute_id = ?", [$('#attributeId').val()]]; 
        q.attribute_id = $('#attributeId').val();
        q.jap_translation  = $('#japTranslation').val();
        q.eng_translation  = $('#engTranslation').val();
        q.save(function(){

          $('#attributeId').val("");
          $('#japTranslation').val("");

          getAttributeList();
          $('#message').html("");

          swal("Success!", "Translation successfully saved!", "success");
          $('#translationModal').modal('hide');

        });        

      }      
    
    }
  
});

function translation(index){

  angular.element($('#translation')).scope().viewTranslation(index);

}

