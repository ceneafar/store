<?php
class SupplierView
{
    public function showSupplierForm()
    {
        echo "
        <div id='supplier'>
            <h2>Suppliers</h2>
            <form>
                <div>
                    <label for='supplierName'>Supplier name</label>
                    <input id='supplierName' type='text' placeholder='Supplier name'>
                </div>
                <div>
                    <label for='identityCard'>Identity card</label>
                    <input id='identityCard' type='text' placeholder='Identity Card'>
                </div>
                <input type='submit' value='Save'>
            </form>            
        </div>
        ";
    }
}
