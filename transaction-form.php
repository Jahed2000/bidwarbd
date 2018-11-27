<?php
if (empty($_SESSION['email']))
    session_start();

if (!isset($_SESSION['email']) && empty($_SESSION['email']) && is_null($_SESSION['email'])) {
    header('location:index.php');
}
include_once 'inc/header.php';


?>

<style>
    .transaction-form {
        padding: 40px;
        max-width: 600px;
        margin: 40px auto;
        border-radius: 4px;
    }
</style>


<section id="transaction-info">
    <div class="heading heading-v1 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-bottom: 40px;">
        <h3>Recharge your Account</h3>
    </div>

</section>


<section id="transaction-page">
    <div class="container">
        <div class="heading heading-v1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h4>Fill Your Information</h4>
        </div>
        <div class="row transaction-wrap">
            <div class="status alert alert-success" style="display: none"></div>
            <form id="main-transaction-form" class="transaction-form" name="transaction-form" method="post" action="submitTransaction.php">
                <div class="col-md-12 col-sm-12 ">

                    <div class="form-group transaction-input">
                        <label>Transaction ID *</label>
                        <input name="transaction_id" type="number" class="form-control" required="required">
                    </div>
                    <div class="form-group transaction-input">
                        <label>Amount *</label>
                        <input name="user_cash" type="number" class="form-control" required="required">
                    </div>
                    <div class="form-group transaction-input">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg">Recharge</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php include_once 'inc/footer.php'; ?>


