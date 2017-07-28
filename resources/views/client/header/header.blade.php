<header class="header">
 
  <div class="container">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> 
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span> 
          <span class="icon-bar"></span> 
          <span class="icon-bar"></span> 
        </button>
            
        <table style="height:70px" id="logo-table">
          <tr>
            <td>
              <a href="/eng" class="lang active"> <img src="frontend/asset/images/us.png" style="width:25px;"> </a><br>
              <a href="/jap"  id="lang"><img src="frontend/asset/images/japan.png" style="width:25px">  </a>  
            </td>
            <td>
              <a href="#" class="navbar-brand scroll-top logo  animated bounceInLeft" style="padding:0px; margin-top: 0px;"><img src="frontend/asset/images/logo.png" style="height: 100%" /></a>
            </td>
          </tr>
        </table>

    </div>
      
      <div id="main-nav" class="collapse navbar-collapse">
         <!-- <select class="selectpicker pull-left" onchange="location = this.value;" >
          <option >Language</option>
          <option value="/eng"> <images scr="frontend/asset/images/flag-us.png" /> </option>
          <option value="/jap" data-content='<span class="flag-icon flag-icon-jp"></span> Janansese'> Japanese</option>
        </select> -->

        <ul class="nav navbar-nav" id="mainNav">

          <li class="active" id="firstLink"><a href="#home" class="scroll-link">{{$Home}}</a></li>
          
          <li><a href="#work" class="scroll-link">{{$Projects}}</a></li>
          <li><a href="#services" class="scroll-link" >{{$Services}}</a></li>
          <li><a href="#location" class="scroll-link" >{{$location}}</a></li>
          <li><a href="#aboutUs" class="scroll-link">{{$AboutUs}}</a></li>
          <li><a href="#plans" class="scroll-link hidden">{{$Price}}</a></li>
          <li><a href="#team" class="scroll-link hidden">{{$Team}}</a></li>
          <li><a href="#contactUs" class="scroll-link">{{$ContactUs}}</a></li>
        </ul>

      </div>
      <div>
       
      </div>
      <!--/.navbar-collapse--> 
    </nav>
    <!--/.navbar--> 
  </div>
  <!--/.container--> 
</header>