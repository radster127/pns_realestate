app.controller("login", function($scope, $http) {

  $scope.checkUser = function(){

    $('#message').html("Verifying user...");
    
    var data = {username: $scope.username, password: $scope.password};
    
    $http.post('/checkUser', data, jsonConfig)
     .then(
       function(response){ 
        
        if(response.data.status){

          $('#message').html("User verified.");
          $(location).attr("href", '/attributes');

        }
        else{

          $('#message').html("Incorrect username or password.");

        }
       
       },
       function(){
         alert('fail');
       }
     );

  }

});
