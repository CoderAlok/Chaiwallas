@extends('layout.main')

@section('main-container')

<header id="header" class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3"><div class="logo-top"><a href="">LOGO</a></div></div>
            <div class="col-md-7">

        <nav class="navbar navbar-expand-lg top-menu-sec">
            <div class="container-fluid">
            <!-- <a class="navbar-brand" href="#">Brand</a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav">
            <li class="nav-item active"> <a class="nav-link" href="#">Pricing</a> </li>
            <li class="nav-item"><a class="nav-link" href="#"> Contact </a></li>
            <li class="nav-item dropdown">
                <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown">Resources</a>
                <!--<ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#"> Submenu item 1</a></li>
                <li><a class="dropdown-item" href="#"> Submenu item 2 </a></li>
                <li><a class="dropdown-item" href="#"> Submenu item 3 </a></li>
                </ul>-->
            </li>
            <li class="nav-item"><a class="nav-link" href="#">Login</a></li>

            </ul>
            </div> <!-- navbar-collapse.// -->
            </div> <!-- container-fluid.// -->
        </nav>

            </div>
            <div class="col-md-2">
            <div class="menu-button"><a href="#" class="new-button">Start Free Trial</a></div>

            </div>
        </div>
    </div>
</header>


<section class="home-top-banner-sec">
    <div class="container-fluid">
        <div class="heading-1">
            <h1>We Probide The Faster,<br>
                Fresher, Better Copy
            </h1>
        </div>
        <div class="heading-2">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam purus <br>
            ligula, faucibus nec consequat eget, eleifend sit amet turpis. Suspendisse sit amet <br>
            sollicitudin velit. Etiam nulla est.
        </div>
        <div class="home-banner-button">
            <a href="#" class="new-button">Get started</a>
        </div>
    </div>
</section>

<section class="home-page-sec-2">
     <div class="container">
        <div class="row">
             <div class="col-md-7">
                <h4>Hello, here is your new AI copywriting assistant.</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam purus ligula, faucibus nec consequat eget, eleifend sit amet turpis. Suspendisse sit amet sollicitudin velit. Etiam nulla est.</p>
             </div>
            <div class="col-md-5">
                <img src="local-img/hand.png" alt="">
            </div>

        </div>

  </div>
</section>


<section class="home-page-sec-3">
     <div class="container">
      <h4 class="text-center">What can you create?</h4>
        <div class="row">

          <div class="col-md-4 sec-3-box-1 mb-4">
            <div class="sec-1-box">
              <div class="icon-box"><img src="local-img/mike.svg" alt=""></div>
              <h5>Digital ad copy</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam purus ligula, faucibus nec.</p>
            </div>
          </div>

          <div class="col-md-4 sec-3-box-2 mb-4">
            <div class="sec-1-box">
              <div class="icon-box"><img src="local-img/social.svg" alt=""></div>
              <h5>Social media content</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam purus ligula, faucibus nec.</p>
            </div>
          </div>


          <div class="col-md-4 sec-3-box-3 mb-4">
            <div class="sec-1-box">
              <div class="icon-box"><img src="local-img/website.svg" alt=""></div>
              <h5>Website copy</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam purus ligula, faucibus nec.</p>
            </div>
          </div>


          <div class="col-md-4 sec-3-box-4 mb-4">
            <div class="sec-1-box">
              <div class="icon-box"><img src="local-img/e-com.svg" alt=""></div>
              <h5>eCommerce copy</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam purus ligula, faucibus nec.</p>
            </div>
          </div>



          <div class="col-md-4 sec-3-box-5 mb-4">
            <div class="sec-1-box">
              <div class="icon-box"><img src="local-img/bolg.svg" alt=""></div>
              <h5>Blog content</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam purus ligula, faucibus nec.</p>
            </div>
          </div>




          <div class="col-md-4 sec-3-box-6 mb-4">
            <div class="sec-1-box">
              <div class="icon-box"><img src="local-img/sales.svg" alt=""></div>
              <h5>Sales copy</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam purus ligula, faucibus nec.</p>
            </div>
          </div>

       </div>
  </div>
</section>

<section class="home-page-sec-4">
     <div class="container">
      <h4 class="text-center">Who are we a perfect fit for?</h4>
        <div class="row">

            <div class="col-md-4">
              <div class="sec-4-box">
                <h5>Sales copy</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam purus ligula, faucibus nec.</p>
              </div>
            </div>

            <div class="col-md-4">
              <div class="sec-4-box">
                <h5>Marketers</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam purus ligula, faucibus nec.</p>
              </div>
            </div>

            <div class="col-md-4">
              <div class="sec-4-box">
                <h5>Agencies</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam purus ligula, faucibus nec.</p>
              </div>
            </div>
        </div>
  </div>
</section>


<section class="home-page-sec-5">
     <div class="container">
      <h4 class="text-center">Who are we a perfect fit for?</h4>
      <div class="row mb-5">

       <div class="col-md-4">
            <div class="sec-5-box">
              <div class="number-line w-100 ">
                <div class="number">1</div>
                  <div class="line-down dn-one"><img src="local-img/path-down.svg" alt=""></div>
              </div>
              <h5>Choose a skill</h5>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam purus ligula, faucibus nec.</p>
            </div>
      </div>

        <div class="col-md-4">
            <div class="sec-5-box">
              <div class="number-line up-line w-100 ">
                <div class="number">2</div>
                  <div class="line-down dn-two"><img src="local-img/path-up.svg" alt=""></div>
              </div>
              <h5>Input your product data</h5>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam purus ligula, faucibus nec.</p>
            </div>
      </div>


          <div class="col-md-4">
            <div class="sec-5-box">
              <div class="number-line w-100 ">
                <div class="number">3</div>
              </div>
              <h5>Generate AI content</h5>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam purus ligula, faucibus nec.</p>
            </div>
      </div>

  </div>
     <div class="content-box-button w-100 mt-5 text-center d-inline-block"><a href="#" class="new-button">Get started</a></div>
</section>



<section class="home-page-sec-6 pt-5">
     <div class="container">
        <h4 class="text-center">Scale your marketing content infinite times over</h4>
        <div class="row col-container">

          <div class="col-md-3 col">
            <div class="sec-box-6">
                <h5>Empower your Team</h5>
                <p>Give time and bandwidth back to your team, avoid writer’s block and drive unprecedented growth</p>
            </div>
          </div>

          <div class="col-md-3 col">
            <div class="sec-box-6">
                <h5>Optimize workflows</h5>
                <p>Copysmith seamlessly integrates with the tools marketers use every day to save you time and hassle.</p>
            </div>
          </div>

          <div class="col-md-3 col">
            <div class="sec-box-6">
                <h5>Speed through ideation</h5>
                <p>Spend less time on discovery and more time generating content. Support more clients and generate more revenue</p>
            </div>
          </div>

          <div class="col-md-3 col">
            <div class="sec-box-6">
                <h5>Enhance your content</h5>
                <p>Machine learning improves your content over time to continuously generate high quality, growth-driven content at scale</p>
            </div>
          </div>
        </div>
    </div>

</section>


<section class="home-page-sec-7">
     <div class="container">
      <div class="sec-content text-center d-inline-block w-100">
        <h3>Create Content Faster With Artificial Intelligence</h3>
      </div>

        <div class="content-box-button w-100 mt-5 text-center d-inline-block"><a href="#" class="new-button">Get started today</a></div>
    </div>
</section>


@endsection
