<?php
	include('header.php');
?>
          <!-- section begin -->
          <section id="section-schedule" aria-label="section-services-tab" data-bgimage="url(images-event/bg/2.png) fixed center no-repeat">
            <div class="wm wm-border dark wow fadeInDown ">event</div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                        <h1>Events</h1>
                        <div class="separator"><span><i class="fa fa-square"></i></span></div>
                        <div class="spacer-single"></div>
                    </div>

                    <div class="col-md-12 wow fadeInUp">
                        <div class="de_tab tab_style_4 text-center">
                            <ul class="de_nav de_nav_dark">
                                <li class="active" data-link="#section-services-tab">
                                    <h3><span>COMPUTER SCIENCE</span></h3>
                                    <h4>Engineering</h4>
                                </li>
                                <li data-link="#section-services-tab">
                                    <h3><span>ELECTRICAL & ELECTRONICS</span></h3>
                                    <h4>Engineering</h4>
                                </li>
                                <li data-link="#section-services-tab">
                                    <h3><span>MECHANICAL</span></h3>
                                    <h4>Engineering</h4>
                                </li>
                                <li data-link="#section-services-tab">
                                    <h3><span>CHEMICAL</span></h3>
                                    <h4>Engineering</h4>
                                </li>
                            </ul>

                            <div class="de_tab_content text-left">

                                <div id="tab1" class="tab_single_content dark">
                                    <div class="row">
                                    	<div class="col-md-1"></div>
                                        <div class="col-md-11">
                                        	<?php 
                                        		$get_event_list = get_event_list('COMPUTER');
                                        		foreach ($get_event_list as $key => $value) {
                                        		    if($value['event_ID'] === "21")
                                        		    {
                                        		        if($_SESSION['USER_ID'] === "TEX41747")
                                        		        {
                                        		        ?>
                                        		        <div class="schedule-listing">
		                                                <div class="schedule-item">
		                                                    <div class="sc-pic">
		                                                        <img src="<?php echo IMAGE_PATHs.$value['cover_img']; ?>" class="img-circle" alt="">
		                                                    </div>
		                                                    
		                                                    <div class="sc-info">
		                                                        <h3><?php echo $value['title']; ?></h3>
		                                                        <p><?php echo $value['introduction']; ?></p>
		                                                        <div class="sc-name">
		                                                        	<a href="event_detail.php?id=<?php echo $value['event_ID']; ?>" class="btn-custom text-white scroll-to my-2">View</a>
		                                                    	</div>
		                                                    </div>

		                                                    <div class="clearfix"></div>
		                                                </div>
		                                            </div>
                                        		        <?php
                                        		        }
                                        		    }
                                        		    else
                                        		    {
                                        			?>
                                        			<div class="schedule-listing">
		                                                <div class="schedule-item">
		                                                    <div class="sc-pic">
		                                                        <img src="<?php echo IMAGE_PATHs.$value['cover_img']; ?>" class="img-circle" alt="">
		                                                    </div>
		                                                    
		                                                    <div class="sc-info">
		                                                        <h3><?php echo $value['title']; ?></h3>
		                                                        <p><?php echo $value['introduction']; ?></p>
		                                                        <div class="sc-name">
		                                                        	<a href="event_detail.php?id=<?php echo $value['event_ID']; ?>" class="btn-custom text-white scroll-to my-2">View</a>
		                                                    	</div>
		                                                    </div>

		                                                    <div class="clearfix"></div>
		                                                </div>
		                                            </div>
                                        			<?php
                                        		    }
                                        		}
                                        	?>
                                        </div>
                                    </div>
                                </div>

                                <div id="tab2" class="tab_single_content dark">
                                    <div class="row">
                                    	<div class="col-md-1"></div>
                                        <div class="col-md-11">
                                        	<?php 
                                        		$get_event_list = get_event_list('ELECTRONIC');
                                        		if(!empty($get_event_list)){
                                        		foreach ($get_event_list as $key => $value) {
                                        			?>
                                        			<div class="schedule-listing">
		                                                <div class="schedule-item">
		                                                    <div class="sc-pic">
		                                                        <img src="<?php echo IMAGE_PATHs.$value['cover_img']; ?>" class="img-circle" alt="">
		                                                    </div>
		                                                    
		                                                    <div class="sc-info">
		                                                        <h3><?php echo $value['title']; ?></h3>
		                                                        <p><?php echo $value['introduction']; ?></p>
		                                                        <div class="sc-name">
		                                                        	<a href="event_detail.php?id=<?php echo $value['event_ID']; ?>" class="btn-custom text-white scroll-to my-2">View</a>
		                                                    	</div>
		                                                    </div>

		                                                    <div class="clearfix"></div>
		                                                </div>
		                                            </div>
                                        			<?php		
                                        		}
                                        		}
                                        		else{
                                        		    ?>
                                        		       <div class="schedule-listing">
		                                                <div class="schedule-item">
		                                                    <div class="sc-pic">
		                                                        <!--<img src="<?php //echo IMAGE_PATHs.$value['cover_img']; ?>" class="img-circle" alt="">-->
		                                                    </div>
		                                                    
		                                                    <div class="sc-info">
		                                                        <h3>No Events</h3>
		                                                        <!--<p><?php //echo $value['introduction']; ?></p>
		                                                        <div class="sc-name">
		                                                        	<a href="" class="btn-custom text-white scroll-to my-2">View</a>
		                                                    	</div>-->
		                                                    </div>

		                                                    <div class="clearfix"></div>
		                                                </div>
		                                            </div>
                                        		    <?php
                                        		}
                                        	?>
                                        </div>
                                    </div>
                                </div>

                                <div id="tab3" class="tab_single_content dark">
                                    <div class="row">
                                    	<div class="col-md-1"></div>
                                        <div class="col-md-11">
                                        	<?php 
                                        		$get_event_list = get_event_list('MECHANICAL');
                                        		if(!empty($get_event_list)){
                                        		foreach ($get_event_list as $key => $value) {
                                        			?>
                                        			<div class="schedule-listing">
		                                                <div class="schedule-item">
		                                                    <div class="sc-pic">
		                                                        <img src="<?php echo IMAGE_PATHs.$value['cover_img']; ?>" class="img-circle" alt="">
		                                                    </div>
		                                                    
		                                                    <div class="sc-info">
		                                                        <h3><?php echo $value['title']; ?></h3>
		                                                        <p><?php echo $value['introduction']; ?></p>
		                                                        <div class="sc-name">
		                                                        	<a href="event_detail.php?id=<?php echo $value['event_ID']; ?>" class="btn-custom text-white scroll-to my-2">View</a>
		                                                    	</div>
		                                                    </div>

		                                                    <div class="clearfix"></div>
		                                                </div>
		                                            </div>
                                        			<?php		
                                        		}
                                        		}
                                        		else{
                                        		    ?>
                                        		       <div class="schedule-listing">
		                                                <div class="schedule-item">
		                                                    <div class="sc-pic">
		                                                        <!--<img src="<?php //echo IMAGE_PATHs.$value['cover_img']; ?>" class="img-circle" alt="">-->
		                                                    </div>
		                                                    
		                                                    <div class="sc-info">
		                                                        <h3>No Events</h3>
		                                                        <!--<p><?php //echo $value['introduction']; ?></p>
		                                                        <div class="sc-name">
		                                                        	<a href="" class="btn-custom text-white scroll-to my-2">View</a>
		                                                    	</div>-->
		                                                    </div>

		                                                    <div class="clearfix"></div>
		                                                </div>
		                                            </div>
                                        		    <?php
                                        		}
                                        	?>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab4" class="tab_single_content dark">
                                    <div class="row">
                                    	<div class="col-md-1"></div>
                                        <div class="col-md-11">
                                        	<?php 
                                        		$get_event_list = get_event_list('CHEMICAL');
                                        		if(!empty($get_event_list)){
                                        		foreach ($get_event_list as $key => $value) {
                                        			?>
                                        			<div class="schedule-listing">
		                                                <div class="schedule-item">
		                                                    <div class="sc-pic">
		                                                        <img src="<?php echo IMAGE_PATHs.$value['cover_img']; ?>" class="img-circle" alt="">
		                                                    </div>
		                                                    
		                                                    <div class="sc-info">
		                                                        <h3><?php echo $value['title']; ?></h3>
		                                                        <p><?php echo $value['introduction']; ?></p>
		                                                        <div class="sc-name">
		                                                        	<a href="event_detail.php?id=<?php echo $value['event_ID']; ?>" class="btn-custom text-white scroll-to my-2">View</a>
		                                                    	</div>
		                                                    </div>

		                                                    <div class="clearfix"></div>
		                                                </div>
		                                            </div>
                                        			<?php		
                                        		}
                                        		}
                                        		else{
                                        		    ?>
                                        		       <div class="schedule-listing">
		                                                <div class="schedule-item">
		                                                    <div class="sc-pic">
		                                                        <!--<img src="<?php //echo IMAGE_PATHs.$value['cover_img']; ?>" class="img-circle" alt="">-->
		                                                    </div>
		                                                    
		                                                    <div class="sc-info">
		                                                        <h3>No Events</h3>
		                                                        <!--<p><?php //echo $value['introduction']; ?></p>
		                                                        <div class="sc-name">
		                                                        	<a href="" class="btn-custom text-white scroll-to my-2">View</a>
		                                                    	</div>-->
		                                                    </div>

		                                                    <div class="clearfix"></div>
		                                                </div>
		                                            </div>
                                        		    <?php
                                        		}
                                        	?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </section>
          <!-- section close -->

<?php 
	include('footer.php');
?>