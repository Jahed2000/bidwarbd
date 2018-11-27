<?php include_once 'inc/header.php';?>

        <!--============================
        ==*****FAQs Section Start*****==
        ==============================-->
        <section class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="heading heading-v1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h2>FIND AN ANSWER</h2>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="accordion">
                                    
                                    <div class="panel-group" id="accordion1">
                                        <div class="panel panel-default">
                                            <div class="panel-heading active">
                                                <h3 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1">
                                                    What is Bidwarbd.com all about ? What is it's concept?
                                                    <i class="fa fa-angle-right pull-right"></i>
                                                    </a>
                                                </h3>
                                            </div>
                                            <div id="collapseOne1" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    Bidwarbd.com is an unique Online auction platform that allows you to BID on branded products and gives you a change to WIN products at nominal prices. It’s a kind of fun bargain deals and online Shopping.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1">
                                                    Who can participate in bidwarbd's online Auctions?
                                                    <i class="fa fa-angle-right pull-right"></i>
                                                    </a>
                                                </h3>
                                            </div>
                                            <div id="collapseTwo1" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                Any one above 18+ years of age can sign up and participate in bidwarbd Auctions. Users from Abroad can also join Bidwarbd.com but they will have to pay additional shipping charges for International Shipping.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapseFour1">
                                                Lorem ipsum dolor sit amet
                                                <i class="fa fa-angle-right pull-right"></i>
                                                </a>
                                                </h3>
                                            </div>
                                            <div id="collapseFour1" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div> 
                        </div>
                    </div>
                    
                </div>
            </div><!--container-->
        </section>
	<!--============================
        ===*****FAQs Section End*****===
        ==============================-->  
        
        <script>
            $(document).ready(function(){
                $('.accordion-toggle').on('click',function(){
                    $(this).closest('.panel-group').children().each(function(){
                            $(this).find('>.panel-heading').removeClass('active');
                    });
                    $(this).closest('.panel-heading').toggleClass('active');
                });
            });
            
        </script>
        
<?php include_once 'inc/footer.php';?>

