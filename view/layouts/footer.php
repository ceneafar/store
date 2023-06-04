<script>
    collection = document.getElementById('content');

    product1 = document.getElementById('product');
    product2 = document.getElementById('createProduct');

    customer1 = document.getElementById('customer');
    customer2 = document.getElementById('createCustomer');

    currency1 = document.getElementById('currency');

    supplier1 = document.getElementById('supplier');
    supplier2 = document.getElementById('supplierList');

    if (product1 && product2) {
        collection.append(product1);
        collection.append(product2);
    }

    if (customer1 && customer2) {
        collection.append(customer1);
        collection.append(customer2);
    }

    if (currency1) {
        collection.append(currency1);
    }

    if (supplier1) {
        collection.append(supplier1);
        collection.append(supplier2);
    }
</script>

</body>

</html>