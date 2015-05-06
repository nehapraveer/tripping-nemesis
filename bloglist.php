<?php
$blogs = Blog::getBlogs();
?>
<div class="inner cover">
  <h2>Blogs</h2>
  <div class="row blog-list">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <?php foreach ($blogs as $blog) { ?>
        <div class="well-lg blog-section">
          <h4><?php echo $blog->blog_title; ?></h4>
          <div class="blog-content"><?php echo $blog->blog_description; ?></div>
          <div class="blog-author">
            <div class="blog-author-name">- <?php echo ucfirst($blog->fname) . ' ' . ucfirst($blog->lname); ?></div>
            <div class="blog-date"><?php echo $blog->created_date;?></div>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-xs-offset-4 col-sm-offset-4 col-md-offset-4">
      <a class="btn btn-block btn-primary btn-large" href="?q=postblog">Post blog</a>
    </div>
  </div>
</div>