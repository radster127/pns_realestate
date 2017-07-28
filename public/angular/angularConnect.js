function Query($http, table){

  this.save = function(callback){

    var data = {};

    for (var key in this) {
      if (this.hasOwnProperty(key) && key != "save" && key != "select" && key != "delete") {
          
          data[key] = this[key];

          if(this.withFile){

            if(key != "withFile" && key != "postFormData" ){
              
              if(key == "where"){

                this.postFormData.append(key, JSON.stringify(this[key])); 

              }
              else{

                this.postFormData.append(key, this[key]); 

              }

            }

          }
      }
    }
    data.table = table;
    data.type = "insert";
    
    if(this.withFile){

      this.postFormData.append("_token", $("[name = _token]").val());
      this.postFormData.append("table", table);
      
      $.ajax({
        url: "/angularConnect", 
        type: "POST",            
        data: this.postFormData, 
        contentType: false,       
        cache: false,            
        processData:false,   
        success: function(data){ console.log(data);
          if(callback != undefined){
            callback();
          }
        }
      });

    }
    else{
      
      $http.post('/angularConnect',data, jsonConfig)
      .then(
        function(response){ console.log(response.data);
          if(callback != undefined){
            callback();
          }
        },
        function(){
          alert('fail');
        }
      );

    }
  }

  this.select = function(callback){

    var data = {};

    for (var key in this) {
      if (this.hasOwnProperty(key) && key != "save" && key != "select" && key != "delete") {
          data[key] = this[key];

      }
    }
    data.table = table;
    data.type = "select";
    $http.post('/angularConnect',data, jsonConfig)
     .then(
       function(response){ console.log(response.data);
         if(callback != undefined){
           callback(response.data);
         }
       },
       function(){
         alert('fail');
       }
     );
  }

  this.delete = function(callback){
    var data = {};

    for (var key in this) {
      if (this.hasOwnProperty(key) && key != "save" && key != "select" && key != "delete") {
          data[key] = this[key];

      }
    }
    data.table = table;
    data.type = "delete";
    $http.post('/angularConnect',data, jsonConfig)
     .then(
       function(response){ console.log(response.data);
         if(callback != undefined){
           callback();
         }
       },
       function(){
         alert('fail');
       }
     );
  }

  if(table == undefined){
    return new Raw($http);
  }

  this.file = function(file){
    
    var formData = new FormData();

    for(var i = 0; i < file.prop('files').length; i++){

      formData.append("file["+i+"]", file.prop('files')[i]);

    }

    this.postFormData = formData;
    this.withFile     = true;

    return "fileType";
  }

}

function Raw($http){

  this.raw = function(query){
    return new RawThen($http, query);
  }
}

function RawThen($http, query){

  var data = {query: query, type: "raw"};

  this.execute = function(callback){

    $http.post('/angularConnect',data, jsonConfig)
     .then(
       function(response){
         if(callback != undefined){
           callback(response.data);
         }
       },
       function(){
         alert('fail');
       }
     );
  }

}
