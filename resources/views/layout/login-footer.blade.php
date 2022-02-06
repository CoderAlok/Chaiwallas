
<footer class="footer-sec">
    <div class="container">
  <div class="row">

    <div class="col-md-4 col-footer">
        <div class="logo-fooer mb-4"><a href="">logo</a></div>
        <div class="fooer-text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam purus ligula, faucibus nec consequat eget, eleifend sit amet turpis. Suspendisse sit amet sollicitudin velit. Etiam nulla est.</p></div>
        <div class="copyright">© 2021 All rights reserved.</div>
    </div>

    <div class="col-md-4 col-footer">
        <div class="fooer-title"><h4>Company</h4></div>
        <div class="fooer-list">
          <ul>
            <li><a href="">Install our Chrome extension</a></li>
            <li><a href="">Join our Face book community</a></li>
            <li><a href="">Join our Affiliate program</a></li>
            <li><a href="">Work with us</a></li>
            <li><a href="">Privacy notice</a></li>
            <li><a href="">Terms of service</a></li>
          </ul>
        </div>
    </div>

    <div class="col-md-4 col-footer">
        <div class="fooer-title"><h4>Support</h4></div>
        <div class="fooer-list">
          <ul>
            <li><a href="">Help center</a></li>
            <li><a href="">View tutorials</a></li>
            <li><a href="">Contact use</a></li>
            <li><a href="">Request a new feature</a></li>
            <li><a href="">Report a bug</a></li>
            <li><a href="">Report an outage</a></li>
          </ul>
        </div>
    </div>






  </div>
      </div>
  </footer>



      <script src="{{ url('/') }}/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
      <script src="{{ url('/') }}/assets/js/bootstrap.bundle.min.js"></script>
      <script src="{{ url('/') }}/assets/js/mazer.js"></script>

      <script type="text/javascript">


          document.addEventListener("DOMContentLoaded", function(){
              // make it as accordion for smaller screens
              if (window.innerWidth > 992) {

              document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem){

                  everyitem.addEventListener('mouseover', function(e){

                  let el_link = this.querySelector('a[data-bs-toggle]');

                  if(el_link != null){
                      let nextEl = el_link.nextElementSibling;
                      el_link.classList.add('show');
                      nextEl.classList.add('show');
                  }

                  });
                  everyitem.addEventListener('mouseleave', function(e){
                  let el_link = this.querySelector('a[data-bs-toggle]');

                  if(el_link != null){
                      let nextEl = el_link.nextElementSibling;
                      el_link.classList.remove('show');
                      nextEl.classList.remove('show');
                  }


                  })
              });

              }
              // end if innerWidth
          });
          // DOMContentLoaded  end

      </script>
  </body>

  </html>
