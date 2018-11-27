<?php include_once 'inc/header.php';?>
        
        <!--==================================
        ==*****Contact Us Section Start*****==
        ====================================-->
        <section id="contact-info">
            <div class="heading heading-v1 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-bottom: 40px;">
                <h2>How to Reach Us?</h2>
            </div>
            <div class="gmap-area">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 text-center">
                            <div class="gmap">
                                <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=JoomShaper,+Dhaka,+Dhaka+Division,+Bangladesh&amp;aq=0&amp;oq=joomshaper&amp;sll=37.0625,-95.677068&amp;sspn=42.766543,80.332031&amp;ie=UTF8&amp;hq=JoomShaper,&amp;hnear=Dhaka,+Dhaka+Division,+Bangladesh&amp;ll=23.73854,90.385504&amp;spn=0.001515,0.002452&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=1073661719450182870&amp;output=embed"></iframe>
                            </div>
                        </div>
                        <div class="col-sm-6 map-content">
                            <ul class="row">
                                <li class="col-sm-6">
                                    <address>
                                        <h5>Zonal Office</h5>
                                        <p>1537 Flint Street <br>
                                        Tumon, MP 96911</p>
                                        <p>Phone:670-898-2847 <br>
                                        Email Address:</p>
                                    </address>
                                    <address>
                                        <h5>Zonal Office</h5>
                                        <p>1537 Flint Street <br>
                                        Tumon, MP 96911</p>
                                        <p>Phone:670-898-2847 <br>
                                        Email Address:</p>
                                    </address>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
        <section id="contact-page">
            <div class="container">
                <div class="heading heading-v1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2>Drop Your Message</h2>
                </div>
                <div class="row contact-wrap">
                    <div class="status alert alert-success" style="display: none"></div>
                    <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="submitContactUs.php">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="form-group contact-input">
                                <label>Name *</label>
                                <input type="text" name="name" class="form-control" required="required">
                            </div>
                            <div class="form-group contact-input">
                                <label>Email *</label>
                                <input type="email" name="email" class="form-control" required="required">
                            </div>
                            <div class="form-group contact-input">
                                <label>Phone</label>
                                <input name = "phone" type="number" class="form-control">
                            </div>
                            <div class="form-group contact-input">
                                <label>Company Name</label>
                                <input name = "company_name" type="text" class="form-control">
                            </div>
                        
                        
                            <div class="form-group contact-input">
                                <label>Subject *</label>
                                <input type="text" name="subject" class="form-control" required="required">
                            </div>
                            <div class="form-group contact-input">
                                <label>Message *</label>
                                <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                            </div>
                            <div class="form-group contact-input">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit Message</button>
                            </div>
                        </div>
                    </form>
                </div> 
            </div> 
        </section> 
        <!--================================
        ==*****Contact Us Section End*****==
        ==================================-->

<?php include_once 'inc/footer.php';?>


