            <!-- footer begin -->
        <footer class="style-2">
            <div class="container">
                <div class="row align-items-middle">
                    <div class="col-md-3">
                        <img src="images-event/Logotex.png" class="logo-small" alt=""><br>
                    </div>

                    <div class="col-md-6">
                        <div class="social-icons d-flex justify-content-between">
                            <a href="terms.php"><span class="id-color">Terms & Condition</span></a>
                            <a href="privacy.php"><span class="id-color">Privacy Policy</span></a>
                            <a href="return.php"><span class="id-color">Refund/Cancellation Policy</span></a>
                        </div>
                    </div>

                    <div class="col-md-3 text-right">
                        <div class="social-icons">
                            <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-middle">
                    <div class="col-md-3">
                    </div>

                    <div class="col-md-6 text-center">
                        Copyright &copy;2022 All rights reserved by <span class="id-color">Texephyr 2022</span>
                    </div>

                    <div class="col-md-3 text-right">
                        <div class="social-icons">
                        </div>
                    </div>
                </div>

            </div>


            <a href="#" id="back-to-top" class="custom-1"></a>
        </footer>
        <!-- footer close -->
        </div>
    </div>


    <div id="de-extra-wrap" class="de_light">
        <span id="b-menu-close">
            <span></span>
            <span></span>
        </span>
        <div class="de-extra-content">
            <h3>Information</h3>
            <p>
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
            </p>

            <div class="spacer10"></div>

            <div class="p-4 border">
                <div class="text-center">
                    <h1>485 of 1000</h1>
                   <p>Seats available</p>
                    <a href="#section-ticket" class="btn-custom btn-fullwidth text-white scroll-to">Get Your Ticket</a>
                </div>
            </div>

            <div class="spacer-single"></div>

            <h3>Where &amp; When?</h3>
            <div class="h6 padding10 pt0 pb0"><i class="i_h3 fa fa-calendar-check-o id-color"></i>March 20th to 25th</div>
            <div class="h6 padding10 pt0 pb0"><i class="i_h3 fa fa-map-marker id-color"></i>Palo Alto, California</div>
            <div class="h6 padding10 pt0 pb0"><i class="i_h3 fa fa-phone id-color"></i>1 200 300 9000</div>
            <div class="h6 padding10 pt0 pb0"><i class="i_h3 fa fa-envelope-o id-color"></i>info@exhibiztheme.com</div>
        </div>
    </div>
    <div id="de-overlay"></div>

    <!-- Javascript Files
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jpreLoader.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/easing.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script src="js/jquery.scrollto.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/jquery.countTo.js"></script>
    <script src="js/video.resize.js"></script>
    
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
	<script src="js/enquire.min.js"></script>
    <script src="js/designesia.js"></script>
	<script src="js/jquery.event.move.js"></script>
	<script src="js/jquery.plugin.js"></script>
    <script src="js/jquery.countdown.js"></script>
    <script src="js/countdown-custom.js"></script>
    <script src="js/jquery.twentytwenty.js"></script>
    <script src="js/toastr.min.js"></script>

    <!-- RS5.0 Core JS Files -->
    <script src="revolution/js/jquery.themepunch.tools.min.js?rev=5.0"></script>
    <script src="revolution/js/jquery.themepunch.revolution.min.js?rev=5.0"></script>

    <!-- RS5.0 Extensions Files -->
    <script src="revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>

    <script>
        jQuery(document).ready(function() {
            // revolution slider
            getcartdetail();
            jQuery("#slider-revolution").revolution({
                sliderType: "standard",
                sliderLayout: "fullwidth",
                delay: 5000,
                navigation: {
                    arrows: {
                        enable: true
                    },
                    bullets: {
                        enable: false,
                        style: 'hermes'
                    },

                },
                parallax: {
                    type: "mouse",
                    origo: "slidercenter",
                    speed: 2000,
                    levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
                },
                spinner: "off",
                gridwidth: 1140,
                gridheight: 700,
                disableProgressBar: "on"
            });
            
        });
    </script>

	<script>
    $(window).on("load", function(){
      $(".twentytwenty-container[data-orientation!='vertical']").twentytwenty({default_offset_pct: 0.7});
      $(".twentytwenty-container[data-orientation='vertical']").twentytwenty({default_offset_pct: 0.3, orientation: 'vertical'});
    });
    function getcartdetail()
    {
        $.ajax({
            url:'process/getuseremail.php',
            type:'POST',
            data:'type=getcartdetail',
                success: function(result){
                    console.log(result);
                   $('#cart').html(result); 
                }                   
            });
    }
    </script>


</body>

</html>