<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Invoice</title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/invoice/style.css">
        <link rel="license" href="http://www.opensource.org/licenses/mit-license/">
    </head>
    <body>
        <header>
            <h1>Invoice</h1>
            <address>
                <p><?php echo $invoice['customer_name'];?></p>
                <p><?php echo $invoice['customer_address'];?></p>
                <p><?php echo $invoice['customer_postcode'];?></p>
                <p><?php echo $invoice['customer_state'];?></p>
                <p><?php echo $invoice['customer_phone']; ?></p>
                <p><?php echo $invoice['customer_fax']; ?></p>
                <p><?php echo $invoice['customer_email']; ?></p>
            </address>
            
           
        </header>
        <article>
            <h1>Recipient</h1>
            <address>
                <p>CRM<br>SeGi MiDae</p>
            </address>
            <table class="meta">
                <tr>
                    <th><span>Invoice No </span></th>
                    <td><span><?php echo $invoice['invoice_id']; ?></span></td>
                </tr>
                <tr>
                    <th><span>Date Issued</span></th>
                    <td><span><?php echo $invoice['invoice_date_created']; ?></span></td>
                </tr>
                <tr>
                    <th><span>Valid Until</span></th>
                    <td><span><?php echo $invoice['invoice_valid_until']; ?></span></td>
                </tr>
                <tr>
                    <th><span>Amount Due</span></th>
                    <td><span id="prefix">$</span><span>600.00</span></td>
                </tr>
            </table>
            <table class="inventory">
                <thead>
                    <tr>
                        <th><span>Item No</span></th>
                        <th><span>Product</span></th>
                        <th><span>Quantity</span></th>
                        <th><span>Price</span></th>
                        <th><span>Discount</span></th>
                        <th><span>Subtotal</span></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php $a=1;
                         $sum = 0;
                                foreach($invoice_items as $key => $val){
                                ?>
                        <td><span><?php echo $a++ ?></span></td>
                        <td><span><?php echo $val['invoice_item_name'];?></span></td>
                        <td><span data-prefix>$</span><span><?php echo $val['invoice_item_quantity']; ?></span></td>
                        <td><span><?php echo $val['invoice_item_price'];?></span></td>
                        <td><span data-prefix>$</span><span><?php echo $val['invoice_item_discount']; ?></span></td>
                        <td><span><?php 

                                        $sum += $val['invoice_item_subtotal'];
                                        echo $val['invoice_item_subtotal'];?></span></td>
                    </tr>
                    <?php
                            }
                                ?>
                </tbody>
            </table>
            <table class="balance">
                <tr>
                    <th><span>Total</span></th>
                    <td><span data-prefix>$</span><span><?php echo $sum ?></span></td>
                </tr>
                <tr>
                    <th><span>Amount Paid</span></th>
                    <td><span data-prefix>$</span><span>0.00</span></td>
                </tr>
                <tr>
                    <th><span>Balance Due</span></th>
                    <td><span data-prefix>$</span><span>600.00</span></td>
                </tr>
            </table>
        </article>
        <aside>
        <br>
        <br>
            <h1><span>Additional Notes</span></h1>
            <div>
                <p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
            </div>
        </aside>
    </body>
</html>