<div class="container  text-center">
  <div class="heading"> 
    <h2>{{$location}}</h2>
  </div>
  <div id="map_wrapper"> 
    <div id="sidebar">
      <div class="sidebar-wrapper">
        <div class="panel panel-default" id="features">
          <div class="panel-heading">
            <h3 class="panel-title">Points of Interest
            <button type="button" class="btn btn-xs btn-default pull-right" id="sidebar-hide-btn"><i class="fa fa-chevron-left"></i></button></h3>
          </div>
          <div class="sidebar-table" >
            <table class="table table-hover" id="feature-list">
              <thead class="hidden">
                <tr>
                  <th>Icon</th>
                <tr>
                <tr>
                  <th>Name</th>
                <tr>
                <tr>
                  <th>Chevron</th>
                <tr>
              </thead>
              <tbody class="list"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="hidden" id="tog-btn">
    <button type="button" class="btn btn-xs btn-default pull-left" id="sidebar-toggle-btn"><i class="fa fa-chevron-right"></i></button>
    </div>
    <div id="map_canvas" style="position:relative;" class="mapping" ></div>
    <!-- <div id="right-panel">
      <h2>Results</h2>
      <ul id="places"></ul>
      <button id="more">More results</button>
    </div> -->

  </div>
     
</div>
<br>
<br>
