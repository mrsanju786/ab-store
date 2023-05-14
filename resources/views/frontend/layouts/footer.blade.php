<!-- subscribe area start -->
<section class="tp-subscribe-area tp-subscribe-square pt-70 pb-65 theme-bg p-relative z-index-1">
            <div class="tp-subscribe-shape">
               <img class="tp-subscribe-shape-1" src="assets/img/subscribe/subscribe-shape-1.png" alt="">
               <img class="tp-subscribe-shape-2" src="assets/img/subscribe/subscribe-shape-2.png" alt="">
               <img class="tp-subscribe-shape-3" src="assets/img/subscribe/subscribe-shape-3.png" alt="">
               <img class="tp-subscribe-shape-4" src="assets/img/subscribe/subscribe-shape-4.png" alt="">
               <!-- plane shape -->
               <div class="tp-subscribe-plane">
                  <img class="tp-subscribe-plane-shape" src="assets/img/subscribe/plane.png" alt="">
                  <svg width="399" height="110" class="d-none d-sm-block" viewBox="0 0 399 110" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M0.499634 1.00049C8.5 20.0005 54.2733 13.6435 60.5 40.0005C65.6128 61.6426 26.4546 130.331 15 90.0005C-9 5.5 176.5 127.5 218.5 106.5C301.051 65.2247 202 -57.9188 344.5 40.0003C364 53.3997 384 22 399 22" stroke="white" stroke-opacity="0.5" stroke-dasharray="3 3"/>
                  </svg>
                  <svg class="d-sm-none" width="193" height="110" viewBox="0 0 193 110" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M1 1C4.85463 20.0046 26.9085 13.6461 29.9086 40.0095C32.372 61.6569 13.5053 130.362 7.98637 90.0217C-3.57698 5.50061 85.7981 127.53 106.034 106.525C145.807 65.2398 98.0842 -57.9337 166.742 40.0093C176.137 53.412 185.773 22.0046 193 22.0046" stroke="white" stroke-opacity="0.5" stroke-dasharray="3 3"/>
                  </svg>
               </div>
            </div>
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-xl-7 col-lg-7">
                     <div class="tp-subscribe-content">
                        <!-- <span>Sale 20% off all store</span> -->
                        <h3 class="tp-subscribe-title">Subscribe our Newsletter</h3>
                     </div>
                  </div>
                  <div class="col-xl-5 col-lg-5">
                     <div class="tp-subscribe-form">
                        <form action="{{url('/subscribe')}}" method ="POST">
                           @csrf
                           <div class="tp-subscribe-input">
                              <input type="email" placeholder="Enter Your Email" name="email" required value="{{old('email')}}">
                              <button type="submit">Subscribe</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- subscribe area end -->       
      <!-- footer area start -->
      <footer>
         <div class="tp-footer-area" data-bg-color="footer-bg-grey">
            <div class="tp-footer-top pt-95 pb-40">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-4 col-lg-3 col-md-4 col-sm-6">
                        <div class="tp-footer-widget footer-col-1 mb-50">
                           <div class="tp-footer-widget-content">
                              <div class="tp-footer-logo">
                                 <a href="{{url('/home')}}">
                                    <!-- <img src="{{asset('frontend/assets/img/logo/logo.svg')}}" alt="logo"> -->
                                    <p>AB-MOBILE</p>
                                 </a>
                              </div>
                              <p class="tp-footer-desc">We are a team of designers and developers that create high quality WordPress</p>
                              <div class="tp-footer-social">
                                 <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                 <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                 <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                 <a href="#"><i class="fa-brands fa-vimeo-v"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="tp-footer-widget footer-col-2 mb-50">
                           <h4 class="tp-footer-widget-title">My Account</h4>
                           <div class="tp-footer-widget-content">
                              <ul>
                                 <li><a href="#">Track Orders</a></li>
                                 <li><a href="#">Shipping</a></li>
                                 <li><a href="#">Wishlist</a></li>
                                 <li><a href="#">My Account</a></li>
                                 <li><a href="#">Order History</a></li>
                                 <li><a href="#">Returns</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="tp-footer-widget footer-col-3 mb-50">
                           <h4 class="tp-footer-widget-title">Infomation</h4>
                           <div class="tp-footer-widget-content">
                              <ul>
                                 <li><a href="#">Our Story</a></li>
                                 <li><a href="#">Careers</a></li>
                                 <li><a href="#">Privacy Policy</a></li>
                                 <li><a href="#">Terms & Conditions</a></li>
                                 <li><a href="{{url('/contact-us')}}">Contact Us</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="tp-footer-widget footer-col-4 mb-50">
                           <h4 class="tp-footer-widget-title">Talk To Us</h4>
                           <div class="tp-footer-widget-content">
                              <div class="tp-footer-talk mb-20">
                                 <span>Got Questions? Call us</span>
                                 <h4><a href="tel:+(91) 8238899162">+(91) 8238899162</a></h4>
                              </div>
                              <div class="tp-footer-contact">
                                 <div class="tp-footer-contact-item d-flex align-items-start">
                                    <div class="tp-footer-contact-icon">
                                       <span>
                                          <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M1 5C1 2.2 2.6 1 5 1H13C15.4 1 17 2.2 17 5V10.6C17 13.4 15.4 14.6 13 14.6H5" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                             <path d="M13 5.40039L10.496 7.40039C9.672 8.05639 8.32 8.05639 7.496 7.40039L5 5.40039" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                             <path d="M1 11.4004H5.8" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                             <path d="M1 8.19922H3.4" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                          </svg>
                                       </span>
                                    </div>
                                    <div class="tp-footer-contact-content">
                                       <p><a href="mailto:shofy@support.com">ab@support.com</a></p>
                                    </div>
                                 </div>
                                 <div class="tp-footer-contact-item d-flex align-items-start">
                                    <div class="tp-footer-contact-icon">
                                       <span>
                                          <svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M8.50001 10.9417C9.99877 10.9417 11.2138 9.72668 11.2138 8.22791C11.2138 6.72915 9.99877 5.51416 8.50001 5.51416C7.00124 5.51416 5.78625 6.72915 5.78625 8.22791C5.78625 9.72668 7.00124 10.9417 8.50001 10.9417Z" stroke="currentColor" stroke-width="1.5"/>
                                             <path d="M1.21115 6.64496C2.92464 -0.887449 14.0841 -0.878751 15.7889 6.65366C16.7891 11.0722 14.0406 14.8123 11.6313 17.126C9.88298 18.8134 7.11704 18.8134 5.36006 17.126C2.95943 14.8123 0.210885 11.0635 1.21115 6.64496Z" stroke="currentColor" stroke-width="1.5"/>
                                          </svg>
                                       </span>
                                    </div>
                                    <div class="tp-footer-contact-content">
                                       <p><a href="https://www.google.com/maps/place/Sleepy+Hollow+Rd,+Gouverneur,+NY+13642,+USA/@44.3304966,-75.4552367,17z/data=!3m1!4b1!4m6!3m5!1s0x4cccddac8972c5eb:0x56286024afff537a!8m2!3d44.3304928!4d-75.453048!16s%2Fg%2F1tdsjdj4" target="_blank">Surat. <br> Gujrat</a></p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tp-footer-bottom">
               <div class="container">
                  <div class="tp-footer-bottom-wrapper">
                     <div class="row align-items-center">
                        <div class="col-md-6">
                           <div class="tp-footer-copyright">
                           <!-- |  HTML Template by <a href="{{url('/home')}}">Themepure</a>. -->
                              <p>© 2023 All Rights Reserved  </p>
                           </div>
                        </div>
                        <!-- <div class="col-md-6">
                           <div class="tp-footer-payment text-md-end">
                              <p>
                                 <img src="{{asset('frontend/assets/img/footer/footer-pay.png')}}" alt="">
                              </p>
                           </div>
                        </div> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer area end -->