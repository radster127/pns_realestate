app.controller("archive", function($scope, $http) {

  getArchivedFiles();

  function getArchivedFiles(){

    $http.get('/getArchive', {}, jsonConfig)
     .then(
       function(response){ 
        
        console.log(response.data);
        $scope.archiveList = response.data;

       },
       function(){
         alert('fail');
       }
     );

  }

  $scope.viewImage = function(imageName){

    $('#imagePreview').attr('src', imageName);
    $('#viewImage').modal("show");

  }

});


