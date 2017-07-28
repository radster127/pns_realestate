<div class="parlex-back" >
  <div class="container">
    <div class="row">
      <div class="heading text-center"> 
        <!-- Heading -->
        <h2>{{$ContactUs}}</h2>
        <div class="btn">Request Quote</div>
      </div>
    </div>
    <div class="row mrgn30">
      <form>
        <div class="col-sm-12">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name"  placeholder="Enter name" title="Please enter your name (at least 2 characters)">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" title="Please enter a valid email address">
          </div>
          <div class="form-group">
            <label for="comments">Message</label>
            <textarea name="comment" class="form-control" id="comments" cols="15" rows="5"  placeholder="Enter your message…" title="Please enter your message (at least 10 characters)"></textarea>
            <button name="submit" type="submit" class="btn btn-lg btn-primary" id="submit">Submit</button>
          </div>
          <div class="result"></div>
        </div>
      </form>
    </div>
     
  </div>
  <!--/.container--> 

</div>
