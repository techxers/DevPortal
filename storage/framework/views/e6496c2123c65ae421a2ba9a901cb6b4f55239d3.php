
<script src="<?php echo e(asset('vendors/js/vendors.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/js/ui/prism.min.js')); ?>"></script>
<?php echo $__env->yieldContent('vendor-script'); ?>

<script src="<?php echo e(asset('js/core/app-menu.js')); ?>"></script>
<script src="<?php echo e(asset('js/core/app.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/components.js')); ?>"></script>

<script src="<?php echo e(asset('js/scripts/customizer.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts/footer.js')); ?>"></script>

<?php echo $__env->yieldContent('page-script'); ?>

<script src="<?php echo e(asset('vendors/js/extensions/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/js/calendar/fullcalendar.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/js/calendar/extensions/daygrid.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/js/calendar/extensions/timegrid.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/js/calendar/extensions/interactions.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/js/pickers/pickadate/picker.js')); ?>"></script>
<script src="<?php echo e(asset('vendors/js/pickers/pickadate/picker.date.js')); ?>"></script>


<script>
    var payMethods = document.getElementsByClassName("pay-mt");
    $(".pay-check").change(function () {

        for (var i = 0; i < payMethods.length; i++) {
            payMethods[i].style.display = "none";
        }
        payMethods[this.title].style.display = "block";
    });


    var pkgs = document.getElementsByClassName('pkgs');
    for (var i = 0; i < pkgs.length; i++) {
        pkgs[i].style.display = "none";
    }
    pkgs[0].style.display = "block";

    $("#service").change(function () {
        for (var i = 0; i < pkgs.length; i++) {
            pkgs[i].style.display = "none";
        }
        var v = (this.value) - 1;
        pkgs[v].style.display = "block";
    });


    /***********************dealing with product selection**********************/
    var productsPlans = document.getElementsByClassName('productPlans');
    var products = document.getElementsByClassName('productSelect');
    var formReference = document.forms["registerForm"];
    var total = 0;
    for (var x = 0; x < productsPlans.length; x++) {
        productsPlans[x].style.display = "none";
    }
    $(".productSelect").change(function () {
        for (var x = 0; x < products.length; x++) {
            if (products[x].checked) {
                productsPlans[x].style.display = "block";

            } else {
                productsPlans[x].style.display = "none";
            }
        }
        calculateTotal();
    });
    $(".plan_select").change(function () {
        calculateTotal();
    });

    function calculateTotal() {
        total = 0;
        for (var x = 0; x < products.length; x++) {
            if (products[x].checked)
                total += parseInt(formReference['plan_product' + x].value.split("=")[1]);
        }
        document.getElementById("totalPayment").innerHTML = total;
        formReference['regTotalPayee'].value=total;
        collectProducts();
    }

    function collectProducts() {
        var outProducts="", outPlans="";
        for (var x = 0; x < products.length; x++) {
            if (products[x].checked) {
                outProducts += products[x].value + "%";
                outPlans += formReference['plan_product' + x].value.split("=")[0]+"%";
            }
        }
        formReference['regProducts'].value=outProducts;
        formReference['regPlans'].value=outPlans;
    }
</script>
<?php /**PATH C:\wamp64\www\code\DevPortal\resources\views/panels/scripts.blade.php ENDPATH**/ ?>