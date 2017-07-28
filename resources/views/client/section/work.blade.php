<div  ng-app="pns" ng-controller="landpage" id="landpage">
<div class="container text-center" >
	<div class="heading">
	  <h2>{{$Projects}}</h2>
	  <p>[Insert content here for properties]</p>
	</div>
	<div class="row">
	  <!-- <div class="col-md-12"> -->
	    <div id="portfolio">

	     	<span id="opened_image"></span>

			 <ul class="filters list-inline">
		        <li> <a class="active" data-filter="*" href="#">{{$all}}</a> </li>
		        <li> <a data-filter=".rent" href="#">{{$for_rent}}</a> </li>
		        <li> <a data-filter=".sale" href="#">{{$for_sale}}</a> </li>
		    </ul>
	   	

	   		<div id="iso-container"> 
		   		<div class="items col-md-3 col-sm-6" ng-click="viewBuilding()"  >
	                <div class=" item rent building-item thumbnail">
	                    <figure class="effect-bubba" >
							<img class="prevImage" src="{{$image_new_forest[3]['image_name']}}" />
							<div class="image-content hidden">{{json_encode($image_new_forest)}}</div>
							<figcaption>
								<h2>New Forest</h2> 
							</figcaption>		
						</figure> 
						<div>
					        <div class="preview-details"></div>
						</div> 
						<div class="hidden building-details">
							{!! $image_b !!}
						</div>
	                </div>
	            </div>

	            <div class="items col-md-3 col-sm-6" ng-click="viewBuilding()" >
	                <div class="item rent building-item thumbnail " >
	                    <figure class="effect-bubba" >
							<img class="prevImage" src="{{$image_arena[6]['image_name']}}" />
							<div class="image-content hidden">{{json_encode($image_arena)}}</div>
							<figcaption>
								<h2>Arena Doors</h2> 
								<a>more Images</a>
							</figcaption>

						</figure> 
						<div > 	
					        <div class="preview-details"></div>
						</div> 
						<div class="hidden building-details">
							{!! $image_a !!}
						</div>
	                </div>
	            </div>

	   		</div>
		</div>
	    	
       
     <!--  UI Template


     		<div class="col-md-4 col-sm-6" ng-click="viewBuilding()">
                <div class=" item sale building-item thumbnail">
                    <img src="http://placehold.it/320x150" alt="">
                    <div class="caption">
                        <h4 class="pull-right">$24.99</h4>
                        <h4><a href="#">First Product</a>
                        </h4>
                        <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                    </div>
                    
                </div>
            </div> 
     -->



	  <!--   <div id="iso-container " >
	      	<ul  class="items list-unstyled clearfix animated fadeInRight showing" data-animation="fadeInRight" style="position: relative; height: 438px;">
	        
		        <li class="iso-item rent building-item"  ng-click="viewBuilding()"> 
		        
					<figure class="effect-bubba" >
						<img class="prevImage" src="{{$image_arena[6]['image_name']}}" />
						<div class="image-content hidden">{{json_encode($image_arena)}}</div>
						<figcaption>
							<h2>Arena Doors</h2> 
						</figcaption>		
					</figure> 
					<div> 	
				        <div class="preview-details"></div>
					</div> 
					<div class="hidden building-details">
						{!! $image_a !!}
					</div>
				</li>
				
				<li class="iso-item sale building-item"  ng-click="viewBuilding()"> 
					<figure class="effect-bubba" >
						<img class="prevImage" src="{{$image_new_forest[3]['image_name']}}" />
						<div class="image-content hidden">{{json_encode($image_new_forest)}}</div>
						<figcaption>
							<h2>New Forest</h2> 
						</figcaption>		
					</figure> 
					<div>
				        <div class="preview-details"></div>
					</div> 
					<div class="hidden building-details">
						{!! $image_b !!}
					</div>
				</li> 
			  
			</ul>
	    </div>
	      -->
	        

	       
	      <!-- </ul> -->
	   
	</div>
</div>
<br>
<br>
   <!-- modal -->
  <div id="viewBuildingModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 80%"> 

	  <div class="" id="img-thumb">
        <div style="white-space: nowrap">
          
          <a href="#" ng-repeat="item in imageList">
            <img src="{|item.image_name|}" style="height: 100px; " class="modal-thumb" ng-click="focusImage($index)">
          </a>
          
        </div>
      </div>
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-body" style="padding-top: 0px">
        	<div class="row">
				<div class="col-xs-12"><button type="button" class="close" data-dismiss="modal" style="font-size:40px; color: black">&times;</button></div>
			</div>
      		<div class="row">
      			<div class="col-sm-8">
      				<div class="row" >
			            <div class="col-sm-12">
			              <div class="focused-image">
			                <div id="buildingCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
							  <!-- Indicators -->
							  <ol class="carousel-indicators">
							    <li data-target="#buildingCarousel" data-slide-to="{|$index|}" ng-repeat="item in imageList" class="active" ng-if="$index == 0"></li>
							    <li data-target="#buildingCarousel" data-slide-to="{|$index|}" ng-repeat="item in imageList" ng-if="$index != 0"></li>
							  </ol>

							  <!-- Wrapper for slides -->
							  <div class="carousel-inner">
							    <div class="item active" ng-if="$index == 0" ng-repeat="item in imageList">
							      <img src="{|item.image_name|}" alt="Los Angeles">
							    </div>
							    <div class="item" ng-if="$index != 0" ng-repeat="item in imageList">
							      <img src="{|item.image_name|}" alt="Los Angeles">
							    </div>
							  </div>

							  <!-- Left and right controls -->
							  <a class="left carousel-control" href="#buildingCarousel" data-slide="prev">
							    <span class="glyphicon glyphicon-chevron-left"></span>
							    <span class="sr-only">Previous</span>
							  </a>
							  <a class="right carousel-control" href="#buildingCarousel" data-slide="next">
							    <span class="glyphicon glyphicon-chevron-right"></span>
							    <span class="sr-only">Next</span>
							  </a>
							</div>
			              </div>
			            </div>
			          </div>
			          <br>
      			</div>
      			<div class="col-sm-4">
      				<div class="row">
      					<div class="col-xs-12" id="build-details">
      						<table class="table-bordered table-hover prev-det" >
      							<tr>
      								<td class="detail-td">
      									<b>Building Name</b> <span> </span>
      								</td>
      							</tr>
      							<tr>
      								<td class="detail-td">
      									<b>Price</b> <span> </span>
      								</td>
      							</tr>
      							<tr>
      								<td class="detail-td">
      									<b>Payment Terms</b> <span> </span>
      								</td>
      							</tr>
      							<tr>
      								<td class="detail-td">
      									<b>Maintenance Fee</b> <span> </span>
      								</td>
      							</tr>
      							<tr>
      								<td class="detail-td"> 
      									<b>Floors</b> <span> </span>
      								</td>
      							</tr>
      							<tr>
      								<td class="detail-td">
      									<b>Type</b> <span> </span>
      								</td>
      							</tr>
      							<tr>
      								<td class="detail-td">
      									<b>Size</b> <span> </span>
      								</td>
      							</tr>
      							<tr>
      								<td class="detail-td">
      									<b>Land Area</b> <span> </span>
      								</td>
      							</tr>
      							<tr>
      								<td class="detail-td">
      									<b>Commission</b> <span> </span>
      								</td>
      							</tr>
      							<tr>
      								<td class="detail-td">
      									<b>Occupancy</b> <span> </span>
      								</td>
      							</tr>
      							<tr>
      								<td class="detail-td">
      									<a href="#location" id="building-location"><b>Location</b> <span> </span></a>
      								</td>
      							</tr>
      							<tr>
      								<td class="detail-td">
      									<b>Nearest Station</b> <span> </span>
      								</td>
      							</tr>
      						</table>
      					</div>
      				</div>
      			</div>
      		</div>

        </div>
      </div>

    </div>
  </div>
  <!-- end of modal -->
<script src="frontend/asset/js/jquery-1.8.2.min.js" type="text/javascript"></script> 
<script src="angular/angular.min.js"></script>
<script src="angular/angularApp.js"></script>
<script src="angular/angularConnect.js"></script>
<script src="angular/ctrl_landpage.js"></script>
</div>