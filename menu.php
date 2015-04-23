<?php

function activeClass($page) {
  $cur_page = get_page_name();
  if ($cur_page == $page) {
    return "active";
  }
  return "";
}

?>
<div class="masthead clearfix">
    <div class="inner">
        <span class="logo">
            <canvas id="logo" class="logo-canvas" width="70" height="70">  
               <b>Women's Era Logo</b>  
            </canvas>
            <h3 class="masthead-brand">Women's Era</h3>
        </span>
      <nav>
        <ul class="nav masthead-nav">
          <li class="<?php print activeClass('home'); ?>"><a href="./?q=home">Home</a></li>
          <li class="<?php print activeClass('about'); ?>"><a href="./?q=about">About</a></li>
          <li class="<?php print activeClass('contact'); ?>"><a href="./?q=contact">Contact</a></li>
          <li class="<?php print activeClass('whatsnew'); ?>"><a href="./?q=whatsnew">What's New</a></li>
          <li class="<?php print activeClass('faq'); ?>"><a href="./?q=faq">FAQ</a></li>
          <li class="<?php print activeClass('login'); ?>"><a href="./?q=login">Login</a></li>
        </ul>
      </nav>
    </div>
</div>

