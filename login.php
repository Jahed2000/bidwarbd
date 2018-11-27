<?php include_once 'inc/header.php'; ?>

<style>
    .form {

        padding: 40px;
        max-width: 600px;
        margin: 40px auto;
        border-radius: 4px;

    }

    .tab-group {
        list-style: none;
        padding: 0;
        margin: 0 0 40px 0;
    }

    .tab-group:after {
        content: "";
        display: table;
        clear: both;
    }

    .tab-group li a {
        display: block;
        text-decoration: none;
        padding: 15px;
        background: rgba(160, 179, 176, 0.25);
        color: #a0b3b0;
        font-size: 20px;
        float: left;
        width: 50%;
        text-align: center;
        cursor: pointer;
        -webkit-transition: .5s ease;
        transition: .5s ease;
    }

    .tab-group li a:hover {
        background: #000;
        color: #ffffff;
    }

    .tab-group .active a {
        background: #c52d2f;
        color: #ffffff;
    }

    .tab-content > div:last-child {
        display: none;
    }

    h1 {
        text-align: center;
        color: #4e4e4e;
        font-weight: bold;
        margin: 0 0 40px;

    }

    label {
        position: absolute;
        -webkit-transform: translateY(6px);
        transform: translateY(6px);
        left: 13px;
        color: #4E4E4E;
        -webkit-transition: all 0.25s ease;
        transition: all 0.25s ease;
        -webkit-backface-visibility: hidden;
        pointer-events: none;
        font-size: 15px;
    }

    label .req {
        margin: 2px;
        color: #c52d2f;
    }

    label.active {
        -webkit-transform: translateY(50px);
        transform: translateY(50px);
        left: 2px;
        font-size: 14px;
    }

    label.active .req {
        opacity: 0;
    }

    label.highlight {
        color: #ffffff;
    }

    .tab-content input, textarea {
        font-size: 22px;
        display: block;
        width: 100%;
        height: 100%;
        padding: 5px 10px;
        background: none;
        background-image: none;
        border: 1px solid #a0b3b0;
        border-radius: 5px;
        color: #4e4e4e;

        -webkit-transition: border-color .25s ease, box-shadow .25s ease;
        transition: border-color .25s ease, box-shadow .25s ease;
    }

    input:focus, textarea:focus {
        outline: 0;
        border-color: #c52d2f;
    }

    textarea {
        border: 2px solid #a0b3b0;
        resize: vertical;
    }

    .field-wrap {
        position: relative;
        margin-bottom: 40px;
    }

    .top-row:after {
        content: "";
        display: table;
        clear: both;
    }

    .top-row > div {
        float: left;
        width: 48%;
        margin-right: 4%;
    }

    .top-row > div:last-child {
        margin: 0;
    }

    .button {
        border: 0;
        outline: none;
        border-radius: 5px;
        padding: 15px 0;
        font-size: 2rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: .1em;
        background: #c52d2f;
        color: #ffffff;
        -webkit-transition: all 0.5s ease;
        transition: all 0.5s ease;
        -webkit-appearance: none;
    }

    .button:hover, .button:focus {
        background: #000;
    }

    .button-block {
        display: block;
        width: 100%;
    }

    .forgot {
        margin-top: -20px;
        text-align: right;
    }
</style>
<!--====================================
==*****Login Section Start*****==
======================================-->
<section class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ol class="breadcrumb breadcrumb-arrow">
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><span>Login / Registration</span></li>
                </ol>
            </div>
        </div>
        <div class="row" style="padding-top:40px;">
            <div class="form">
                <ul class="tab-group">
                    <li class="tab active"><a href="#login">Log In</a></li>
                    <li class="tab"><a href="#signup">Sign Up</a></li>
                </ul>

                <div class="tab-content">
                    <!--                    Login area-->
                    <div id="login">
                        <h1>Welcome Back!</h1>
                        <form action="userLogin.php" method="post" id="main-contact-form" class="contact-form">
                            <div class="field-wrap">
                                <label>
                                    Email Address<span class="req">*</span>
                                </label>
                                <input name = "email" type="email" required autocomplete="off"/>
                            </div>
                            <div class="field-wrap">
                                <label>
                                    Password<span class="req">*</span>
                                </label>
                                <input name = "password" type="password" required autocomplete="off"/>
                            </div>
                            <p class="forgot"><a href="#">Forgot Password?</a></p>
                            <button class="button button-block" name="login"/>
                            Log In</button>
                        </form>
                    </div>
                    <!--Sign up area-->
                    <div id="signup">
                        <h1>Sign Up for Free</h1>
                        <form action="userStore.php" method="post">
<!--                            <div class="top-row">-->
<!--                                <div class="field-wrap">-->
<!--                                    <label>-->
<!--                                        First Name<span class="req">*</span>-->
<!--                                    </label>-->
<!--                                    <input type="text" name="first_name" required autocomplete="off"/>-->
<!--                                </div>-->
<!--                                <div class="field-wrap">-->
<!--                                    <label>-->
<!--                                        Last Name<span class="req">*</span>-->
<!--                                    </label>-->
<!--                                    <input type="text" name="last_name" required autocomplete="off"/>-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="field-wrap">
                                <label>
                                    User name<span class="req">*</span>
                                </label>
                                <input type="text" name="name" required autocomplete="off"/>
                            </div>
                            <div class="field-wrap">
                                <label>
                                    Email Address<span class="req">*</span>
                                </label>
                                <input type="email" name="email" required autocomplete="off"/>
                            </div>
                            <div class="field-wrap">
                                <label>
                                    Set A Password<span class="req">*</span>
                                </label>
                                <input type="password" name="password" required autocomplete="off"/>
                            </div>
                            <div class="field-wrap">
                                <label>
                                    Your Mobile Number<span class="req">*</span>
                                </label>
                                <input type="number" name="mobile" required autocomplete="off"/>
                            </div>
                            <div class="field-wrap">
                                <label>
                                    Address<span class="req">*</span>
                                </label>
                                <textarea name="address"  required="required" class="form-control" rows="8"></textarea>
                            </div>

                            <button type="submit" name="register" class="button button-block"/>
                            Sign Up</button>
                        </form>
                    </div>

                </div><!-- tab-content -->

            </div> <!-- /form -->
        </div>
    </div>
</section>

<script>
    $('.form').find('input, textarea').on('keyup blur focus', function (e) {

        var $this = $(this),
            label = $this.prev('label');

        if (e.type === 'keyup') {
            if ($this.val() === '') {
                label.removeClass('active highlight');
            } else {
                label.addClass('active highlight');
            }
        } else if (e.type === 'blur') {
            if ($this.val() === '') {
                label.removeClass('active highlight');
            } else {
                label.removeClass('highlight');
            }
        } else if (e.type === 'focus') {

            if ($this.val() === '') {
                label.removeClass('highlight');
            }
            else if ($this.val() !== '') {
                label.addClass('highlight');
            }
        }

    });

    $('.tab a').on('click', function (e) {

        e.preventDefault();

        $(this).parent().addClass('active');
        $(this).parent().siblings().removeClass('active');

        target = $(this).attr('href');

        $('.tab-content > div').not(target).hide();

        $(target).fadeIn(600);

    });
</script>
<!--====================================
    ===*****Login Section End*****===
    ======================================-->

<?php include_once 'inc/footer.php'; ?>

