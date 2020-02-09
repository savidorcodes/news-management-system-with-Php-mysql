 <aside class="widget widget-review-posts">
            <h4 class="widget-title">Adverts </h4>
            <?php
	               	if( $admin_query = mysqli_query($con,"select * from adverts limit 1"))
			                  {
			                 $num   = mysqli_num_rows($admin_query);
			                 while($row = mysqli_fetch_array($admin_query))
			                  {
			         ?>
            <article class="entry">
              <div class="entry__img-holder">
                <a href="../<?php echo $row['website']; ?>">
                  <div class="thumb-container thumb-60">
                  <img src="admin/<?php echo $row['image'];?>" alt="" class="entry__img lazyload" alt="">
                  </div>
                </a>
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
      </aside>