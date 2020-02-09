<footer class="footer footer--dark">
      <div class="container">
        <div class="footer__widgets">
          <div class="row">

            <div class="col-lg-3 col-md-6">
              <aside class="widget widget-logo">
                <a href="index.html">
                  <img src="img/N1.png" srcset="img/N1.png, img/N1.png" class="logo__img" alt="">
                </a>
                <p class="copyright">
                  © 2019 Ekiensnews | Developed by <a href="http://savidorcodes.org">savidorcodes</a>
                </p>
                <div class="socials socials--large socials--rounded mb-24">
                  <a href="#" class="social social-facebook" aria-label="facebook"><i class="ui-facebook"></i></a>
                  <a href="#" class="social social-youtube" aria-label="youtube"><i class="ui-youtube"></i></a>
                  <a href="#" class="social social-instagram" aria-label="instagram"><i class="ui-instagram"></i></a>
                </div>
              </aside>
            </div>

            <div class="col-lg-2 col-md-6">
              <aside class="widget widget_nav_menu">
                <h4 class="widget-title">Useful Links</h4>
                <ul>
                  <li><a href="about_us.php">About</a></li>
                  <li><a href="advertise.php">Advertise</a></li>
                  <li><a href="contact.php">Contact</a></li>
                </ul>
              </aside>
            </div>  
            
            <div class="col-lg-4 col-lg-4">
            
              <aside class="widget widget-popular-posts">
                <h4 class="widget-title">Previous News</h4>
                <ul class="post-list-small">
                  <li class="post-list-small__item">
                  <?php
	                     	if( $admin_query = mysqli_query($con,"select * from news ORDER BY title DESC limit 2"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			                  ?>
                    <article class="post-list-small__entry clearfix">
                      <div class="post-list-small__img-holder">
                        <div class="thumb-container thumb-100">
                          <a href="single-post.html">
                          <img src="admin/<?php echo $row['image'];?>" alt="" title=""class="post-list-small__img--rounded lazyload"/>
                          </a>
                        </div>
                      </div>
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                        <a href="gossip.php?depcat=<?php echo $row['title'];?>" title="<?php echo $row['tilte'];?>"> <?php echo $row['title'];?> </a>
                        </h3>
                        <ul class="entry__meta">
                          <li class="entry__meta-author">
                            <span>by</span>
                            <?php echo $row['author_name']; ?>
                          </li>
                          <li class="entry__meta-date">
                          <?php echo $row['date_date']; ?>
                          </li>
                        </ul>
                      </div>                  
                    </article>
                    <?php }
				}
				else
				{
					echo 'Query unsuccessful :: ' . $con->errorno;
					var_dump( $con);
				}
                    ?> 

                  </li>
                </ul>
              </aside>      
                     
            </div>
          </div>
        </div>    
      </div> <!-- end container -->
    </footer> <!-- end footer -->