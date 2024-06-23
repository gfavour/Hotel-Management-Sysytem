<!--
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright &copy; 2018-2019. All rights reserved. Boveeri Pavilion Suites.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
<?php include_once 'inc/footer.php'; ?>
<script>
getDiscount(document.frm1.noofroom.value,'<?php echo $minnoofroom; ?>','<?php echo $promodiscount; ?>');
getCheckInOutInterval();
</script>
<script src="../fxn/bar2code-order.js"></script>