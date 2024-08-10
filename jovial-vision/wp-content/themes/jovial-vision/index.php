<?php get_header(); ?>
<!-- banner section start here -->
<section class="banner-sec">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            
            <div class="carousel-item active">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner.webp" class="d-block w-100"
                    alt="...">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 col-offset-5">
                                <div class="banner-content">
                                    <!-- <div class="banner-text">
                                            <h2>Jovial<span> Vision</span></h2>
                                            <ul>
                                                <li>Couple matching cundli</li>
                                                <li>Lucky Vichle Suggestion</li>
                                                <li>Lucky Mobile Nimber</li>
                                            </ul>
                                            <div class="call-into">
                                                <p><a class="phone main-btn" href="tel+91 0123456789"><span>Call
                                                            :</span>+91 0123456789</a></p>
                                                <p><a class="phone main-btn"
                                                        href="mailto:info@jovialvision.com"><span>Email
                                                            :</span>info@jovialvision.com</a></p>
                                            </div>
                                        </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>           
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<!-- banner section end here -->

<section class="stats-sec"
    style="background:url(<?php echo get_template_directory_uri(); ?>/assets/images/bg1.webp) no-repeat center;">
    <div class="container">
        <div class="row row-cols-2 row-cols-lg-4 mb-5">
            <div class="col">
                <div class="feate text-center">
                    <h2>99 <span>+</span></h2>
                    <p> Trusted by
                        Many Clients</p>
                </div>
            </div>
            <div class="col">
                <div class="feate text-center">
                    <h2>50 <span>+</span></h2>
                    <p> Types of

                        Horoscopes</p>
                </div>
            </div>

            <div class="col">
                <div class="feate text-center">
                    <h2>99 <span>+</span></h2>
                    <p> Qualified
                        Astrologers</p>
                </div>
            </div>
            <div class="col">
                <div class="feate text-center">
                    <h2>99 <span>+</span></h2>
                    <p> Success
                        Horoscope</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section class="why-sec">
        <div class="container" bis_skin_checked="1">
            <div class="row" bis_skin_checked="1">
                <div class="col-md-12" bis_skin_checked="1">
                    <div class="why-wrap" bis_skin_checked="1">
                        <div class="section-title" bis_skin_checked="1">
                            <!-- <h2>Why Us? </h2> --
                        </div>
                        <div class="row" bis_skin_checked="1">
                            <div class="col-md-3">
                                <div class="card text-center text-dark  rounded p-3">
                                    <div class="card-body">
                                        <p><i class="fas fa-user-tie fs-1"></i></p>
                                        <h3 class="card-text counter d-inline" data-target="95"> 0 </h3>+
                                        <p class="card-title  fs-5"> Clients</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-center text-dark  rounded p-3">
                                    <div class="card-body">
                                        <p><i class="fas fa-users fs-1"></i></p>
                                        <h3 class="card-text counter d-inline" data-target="110"> 0 </h3>+
                                        <p class="card-title  fs-5">Horoscopes </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-center text-dark  rounded p-3">
                                    <div class="card-body">
                                        <p><i class="fas fa-star fs-1"></i></p>
                                        <i class="fa-solid fa-star"></i>
                                        <h3 class="card-text counter d-inline" data-target="200"> 0 </h3>+
                                        <p class="card-title  fs-5"> Astrologers</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card text-center text-dark  rounded p-3">
                                    <div class="card-body">
                                        <p><i class="fas fa-briefcase fs-1"></i></p>
                                        <h3 class="card-text counter d-inline" data-target="200"> 0 </h3>+
                                        <p class="card-title  fs-5"> Services</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

<!-- bg img section start here -->
<section class="bg-img-sec">
    <figure><img src="<?php echo get_template_directory_uri(); ?>/assets/images/bg1.webp" alt=""></figure>
</section>
<!-- bg img section end here -->

<!-- about1 us section start here -->
<section class="about1-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="about1-img">
                    <figure>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-img1.webp" alt="">
                    </figure>
                </div>
            </div>
            <div class="col-md-6">
                <div class="about1-wrap">
                    <div class="section-title">
                        <h2>About Us</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of
                            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                            publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum
                            is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only
                            five centuries, but also the leap into electronic typesetting, remaining essentially
                            unchanged. It was popularised in the 1960s with the release of Letraset sheets
                            containing Lorem Ipsum passages, and more recently with desktop publishing software like
                            Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of
                            the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                            dummy text ever since the 1500s.
                        </p>
                        <a class="btn-style-1 text-left" href="#">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about us section end here -->

<!-- astrology section start here -->
<section class="astrology-sec pt-b">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Our Service</h2>
                </div>
                <div class="astrology-slider">
                    <div class="owl-carousel owl-theme" id="astrology">
                        <div class="item">
                            <div class="astrology-wrap">
                                <figure>
                                    <a href="#"> <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/ser1.png"
                                            alt=""> </a>
                                </figure>
                                <div class="ser-wrap">
                                    <h3> <a href="#">Couple matching cundli</a> </h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the
                                        1500s.</p>
                                    <a href=""> Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="astrology-wrap">
                                <figure>
                                    <a href="#"> <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/ser2.png"
                                            alt=""> </a>
                                </figure>
                                <div class="ser-wrap">
                                    <h3> <a href="#">Lucky Vichle Suggestion</a> </h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the
                                        1500s.</p>
                                    <a href=""> Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="astrology-wrap">
                                <figure>
                                    <a href="#"> <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/ser3.png"
                                            alt=""> </a>
                                </figure>
                                <div class="ser-wrap">
                                    <h3> <a href="#">Lucky Mobile Nimber</a> </h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the
                                        1500s.</p>
                                    <a href=""> Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="astrology-wrap">
                                <figure>
                                    <a href="#"> <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/ser4.png"
                                            alt=""> </a>
                                </figure>
                                <div class="ser-wrap">
                                    <h3> <a href="#">Lucky Name Consultation</a> </h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the
                                        1500s.</p>
                                    <a href=""> Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="astrology-wrap">
                                <figure>
                                    <a href="#"> <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/ser5.png"
                                            alt=""> </a>
                                </figure>
                                <div class="ser-wrap">
                                    <h3> <a href="#">Business Consultation</a> </h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the
                                        1500s.</p>
                                    <a href=""> Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="astrology-wrap">
                                <figure>
                                    <a href="#"> <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/ser6.png"
                                            alt=""> </a>
                                </figure>
                                <div class="ser-wrap">
                                    <h3> <a href="#">Logo Design</a> </h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the
                                        1500s.</p>
                                    <a href=""> Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="astrology-wrap">
                                <figure>
                                    <a href="#"> <img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/images/ser7.png"
                                            alt=""> </a>
                                </figure>
                                <div class="ser-wrap">
                                    <h3> <a href="#"> Baby name Correction</a> </h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the
                                        1500s.</p>
                                    <a href=""> Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- astrology section end here -->




<!-- insta feed section start here -->
<section class="insta-feed-sec"
    style="background: url(<?php echo get_template_directory_uri(); ?>/assets/images/bg7.webp) no-repeat center;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Success Stories</h2>
                </div>
                <div class="section-padding">
                    <div class="screenshot_slider owl-carousel">
                        <div class="item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/story1.webp" alt=""
                                title="">
                            <div class="achv-content text-center">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/story2.webp" alt=""
                                title="">
                            <div class="achv-content text-center">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/story3.webp" alt=""
                                title="">
                            <div class="achv-content text-center">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/story4.webp" alt=""
                                title="">
                            <div class="achv-content text-center">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- insta feed section end here -->







<!-- products section start here -->
<section class="products-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="products-wrap">
                    <div class="section-title">
                        <h2>Popular Products </h2>
                    </div>
                    <div class="products-box">
                        <div class="owl-carousel owl-theme" id="product">
                            <div class="item">
                                <div class="products">
                                    <div class="al-product-image">
                                        <figure>
                                            <a href="#"> <img
                                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/pro1.png"
                                                    alt=""> </a>
                                        </figure>

                                    </div>
                                    <div class="pro-info">
                                        <h2> <a href="#">Rudraksha</a> </h2>
                                    </div>
                                    <div class="productitem-price">
                                        <span class="price--label">MRP: </span>
                                        <span class="price-compare-single">₹1,499</span>
                                        <span class="money" data-price="">₹928</span>
                                    </div>
                                    <div class="cart-btn">
                                        <button>Add To Cart</button>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="products">
                                    <div class="al-product-image">
                                        <figure>
                                            <a href="#"> <img
                                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/pro2.png"
                                                    alt=""> </a>
                                        </figure>

                                    </div>
                                    <div class="pro-info">
                                        <h2> <a href="#">Tree Crystal</a> </h2>
                                    </div>
                                    <div class="productitem-price">
                                        <span class="price--label">MRP: </span>
                                        <span class="price-compare-single">₹1,499</span>
                                        <span class="money" data-price="">₹928</span>
                                    </div>
                                    <div class="cart-btn">
                                        <button>Add To Cart</button>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="products">
                                    <div class="al-product-image">
                                        <figure>
                                            <a href="#"> <img
                                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/pro3.png"
                                                    alt=""> </a>
                                        </figure>

                                    </div>
                                    <div class="pro-info">
                                        <h2> <a href="#">Braclets</a> </h2>
                                    </div>
                                    <div class="productitem-price">
                                        <span class="price--label">MRP: </span>
                                        <span class="price-compare-single">₹1,499</span>
                                        <span class="money" data-price="">₹928</span>
                                    </div>
                                    <div class="cart-btn">
                                        <button>Add To Cart</button>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="products">
                                    <div class="al-product-image">
                                        <figure>
                                            <a href="#"> <img
                                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/pro4.png"
                                                    alt=""> </a>
                                        </figure>

                                    </div>
                                    <div class="pro-info">
                                        <h2> <a href="#">Dhanlaxmi Potli</a> </h2>
                                    </div>
                                    <div class="productitem-price">
                                        <span class="price--label">MRP: </span>
                                        <span class="price-compare-single">₹1,499</span>
                                        <span class="money" data-price="">₹928</span>
                                    </div>
                                    <div class="cart-btn">
                                        <button>Add To Cart</button>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="products">
                                    <div class="al-product-image">
                                        <figure>
                                            <a href="#"> <img
                                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/pro5.png"
                                                    alt=""> </a>
                                        </figure>

                                    </div>
                                    <div class="pro-info">
                                        <h2> <a href="#">Aroma Oils</a> </h2>
                                    </div>
                                    <div class="productitem-price">
                                        <span class="price--label">MRP: </span>
                                        <span class="price-compare-single">₹1,499</span>
                                        <span class="money" data-price="">₹928</span>
                                    </div>
                                    <div class="cart-btn">
                                        <button>Add To Cart</button>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="products">
                                    <div class="al-product-image">
                                        <figure>
                                            <a href="#"> <img
                                                    src="<?php echo get_template_directory_uri(); ?>/assets/images/pro4.png"
                                                    alt=""> </a>
                                        </figure>

                                    </div>
                                    <div class="pro-info">
                                        <h2> <a href="#">Dhanlaxmi Potli</a> </h2>
                                    </div>
                                    <div class="productitem-price">
                                        <span class="price--label">MRP: </span>
                                        <span class="price-compare-single">₹1,499</span>
                                        <span class="money" data-price="">₹928</span>
                                    </div>
                                    <div class="cart-btn">
                                        <button>Add To Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- productssection end here -->

<!-- Latest videos section start here -->
<section class="blog-sec latest-videos-sec"
    style="background: url(<?php echo get_template_directory_uri(); ?>/assets/images/bg8.webp) no-repeat center;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-wrap">
                    <div class="section-title">
                        <h2>Latest videos</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="blog">
                            <iframe width="100%" height="300" src="https://www.youtube.com/embed/nyQAo2EFo-w"
                                title="Vedic Switchwords for weight loss | Weight loss tips | Jovial vision"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="blog">
                            <iframe width="100%" height="300" src="https://www.youtube.com/embed/c-Nwf60b12M"
                                title="Alphabet R ka S k sath Connection | Dikssha Mehtta | Jovial Vision"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="blog">
                            <iframe width="100%" height="300" src="https://www.youtube.com/embed/ZMisI-ttvv8"
                                title="Upcoming Prediction by Dikssha Mehtta | Jovial Vision" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <a class="btn-style-1" href="#">Watch More Video</a>
            </div>
        </div>
    </div>
</section>
<!-- Latest videos section end here -->



<!-- contact us section start here -->
<section class="contact-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-img">
                    <figure><img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact-img.webp"
                            alt=""></figure>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-form">
                    <div class="form-wrap">
                        <h2>Contact Us</h2>
                        <form>
                            <div class="form-group">
                                <input type="text" name="" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="text" name="" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" name="" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <textarea placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <button>Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact us section end here -->


<!-- blog section start here -->
<section class="blog-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-wrap">
                    <div class="section-title">
                        <h2>Blog</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="blog">
                            <figure><a href="#"><img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/blog1.webp"
                                        alt=""></a></figure>
                            <div class="blog-info">
                                <span>August 14, 2023 </span>
                                <h3><a href="#">What's your horoscope..?</a></h3>
                                <p>Orci porta non pulvinar neque laoreet suspendisse interdum. Neque viverra justo
                                    nec ultrices dui sapien. Aliquam nulla facilisi cras fermentum...</p>
                                <a href="#" class="blog-button">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="blog">
                            <figure><a href="#"><img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/blog2.webp"
                                        alt=""></a></figure>
                            <div class="blog-info">
                                <span>June 19, 2023 </span>
                                <h3><a href="#">Numbers are chosen from your destiny</a></h3>
                                <p>At lectus urna duis convallis convallis tellus id. Tortor aliquam nulla facilisi
                                    cras fermentum odio. Phasellus egestas tellus rutrum tellus... </p>
                                <a href="#" class="blog-button">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="blog">
                            <figure><a href="#"><img
                                        src="<?php echo get_template_directory_uri(); ?>/assets/images/blog3.webp"
                                        alt=""></a></figure>
                            <div class="blog-info">
                                <span>July 07, 2023 </span>
                                <h3><a href="#">Let's make the future more interesting</a></h3>
                                <p>Tortor aliquam nulla facilisi cras fermentum odio. Phasellus egestas tellus
                                    rutrum tellus pellentesque eu tincidunt. Tempor id eu nisl nunc...</p>
                                <a href="#" class="blog-button">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- why me section end here -->
<?php get_footer(); ?>