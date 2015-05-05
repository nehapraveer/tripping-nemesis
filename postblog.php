<?php ?>
<script src="ckeditor/ckeditor.js"></script>
<h2>Post blog</h2>
<form>
  <div class="row blog-row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <input name="blog_title" class="form-control" placeholder="Title" tabindex="1" type="text" 
               value="">
      </div>
    </div>
  </div>

  <div class="row blog-row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="form-group">
        <textarea name="blog_content" id="blog_content"></textarea>
      </div>
    </div>
  </div>
  
  <div class="row blog-row">
    <div class="col-xs-4 col-sm-4 col-md-4 col-xs-offset-4 col-sm-offset-4 col-md-offset-4">
      <input type="submit" value="Post" class="btn btn-block btn-primary btn-large">
    </div>
  </div>
  
</form>

<script>
  CKEDITOR.replace('blog_content');
</script>