    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
                <h2 class="ftco-heading-2">Have a Questions?</h2>
                <div class="block-23 mb-3">
                  <ul>
                    <li><span class="icon icon-map-marker"></span><span class="text">Koh-e-Noor Town Piplan</span></li>
                    <li><a href="#"><span class="icon icon-phone"></span><span class="text">+923007780869</span></a></li>
                    <li><a href="#"><span class="icon icon-envelope"></span><span class="text">jinnahpiplan@gmail.com</span></a></li>
                  </ul>
                </div>


            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Recent Blog</h2> 
              <p>Soon will be available...<br> <a href="{{ url('/blog') }}">see more</a></p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2">Pages</h2>
              <ul class="list-unstyled">
                <li><a href="{{ url('/') }}"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
                <li><a href="{{ url('/about') }}"><span class="ion-ios-arrow-round-forward mr-2"></span>About</a></li>
                <li><a href="{{ url('/team') }}"><span class="ion-ios-arrow-round-forward mr-2"></span>Teachers</a></li>
                <li><a href="{{ url('/blog') }}"><span class="ion-ios-arrow-round-forward mr-2"></span>News</a></li>
                <li><a href="{{ url('/contact-') }}"><span class="ion-ios-arrow-round-forward mr-2"></span>Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
          
                  <div class="ftco-footer-widget mb-5">
                <h2 class="ftco-heading-2 mb-0">Follow Us On</h2>
                <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>
  &copy; 2020 - <script>document.write(new Date().getFullYear());</script> | Jinnah School & college piplan  | Developed by <a href="https://mudassirmahdi.000webhostapp.com/" target="_blank">Mudassir Mehdi</a> </p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
  <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('frontend/js/aos.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('frontend/js/scrollax.min.js') }}"></script>
  
  <script src="{{ asset('frontend/js/main.js') }}"></script>
  

<script type="text/javascript">
   function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>