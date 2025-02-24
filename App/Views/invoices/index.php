<!DOCTYPE html>
<html>
<head>
    <title>Invoices</title>
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
</head>
<body>
    <h1>Invoices</h1>
    <ul>
        <?php foreach ($invoices as $invoice): ?>
            <li>
                <a href="index.php?route=invoice_view&id=<?php echo $invoice['id']; ?>">
                    Invoice #<?php echo $invoice['id']; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php?route=invoice_create">Create New Invoice</a>
</body>
</html>