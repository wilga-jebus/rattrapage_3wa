<h1>Invoice #<?php echo $invoice['id']; ?></h1>
<p>Date: <?php echo $invoice['date']; ?></p>
<p>Amount: <?php echo $invoice['amount']; ?></p>
<a href="index.php?route=invoice_delete&id=<?php echo $invoice['id']; ?>">Delete Invoice</a>