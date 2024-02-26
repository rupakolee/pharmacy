        let total = document.getElementById('total');
        let qty = document.getElementById('quantity');
        let rate = document.getElementById('rate');

        rate.addEventListener('input', function type() {
            let qtyVal = qty.value;
            let rateVal = rate.value;

            total.value = qtyVal*rateVal;
        });
