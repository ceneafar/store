<script>
    collection = document.getElementById('content');

    product1 = document.getElementById('product');
    product2 = document.getElementById('createProduct');

    customer1 = document.getElementById('customer');
    customer2 = document.getElementById('createCustomer');

    currency1 = document.getElementById('currency');
    currency2 = document.getElementById('paymentMethod');


    supplier1 = document.getElementById('supplier');
    supplier2 = document.getElementById('supplierList');

    purchase1 = document.getElementById('purchase');
    purchase2 = document.getElementById('purchaseList');

    invoice1 = document.getElementById('invoice');

    invoiceSecond1 = document.getElementById('invoiceProduct');
    invoiceSecond2 = document.getElementById('invoicePayment');

    if (product1 && product2) {
        collection.append(product1);
        collection.append(product2);
    }

    if (customer1 && customer2) {
        collection.append(customer1);
        collection.append(customer2);
    }

    if (currency1 && currency2) {
        collection.append(currency1);
        collection.append(currency2);
    }

    if (supplier1 && supplier2) {
        collection.append(supplier1);
        collection.append(supplier2);
    }

    if (purchase1 && purchase2) {
        collection.append(purchase1);
        collection.append(purchase2);
    }

    if (invoice1) {
        collection.append(invoice1);
    } else

    if (invoiceSecond1) {
        collection.append(invoiceSecond1);
    } else if (invoiceSecond2) {
        collection.append(invoiceSecond2);
    }
</script>

</body>

</html>