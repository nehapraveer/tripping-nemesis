<div class="container">
  <div class="row">
      <div id="map-outer" class="col-md-12">
          <div id="address" class="col-md-4">
            <h2>Our Location</h2>
            <address>
            <strong>Women's Era</strong><br>
                3131 Homestead Rd,<br>
                Santa Clara<br>
                CA<br>
                <abbr>P:</abbr> +1(859)494-6316
           </address>
          </div>
        <div id="map-container" class="col-md-8">
          <script src="js\map.js"></script>
        </div>
      </div><!-- /map-outer -->
  </div> <!-- /row -->
 
  <div class="row">
  <form class="form-horizontal" name="commentform">
    <div class="form-group">
        <div class="col-md-2">
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name"/>
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name"/>
        </div>
        <div class="col-md-3 input-group">
        <span class="input-group-addon">@</span>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address"/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-7">
            <textarea rows="6" class="form-control" id="comments" name="comments" placeholder="Your question or comment here"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3">
            <button type="submit" value="Submit" class="btn btn-warning pull-right">Send</button>
        </div>
    </div>
</form>
</div><!-- /row -->
</div><!-- /container -->