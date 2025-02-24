<h1>Create New Invoice</h1>
<form method="post" action="index.php?route=invoice_create">
    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required>
    <br>
    <label for="amount">Amount:</label>
    <input type="number" id="amount" name="amount" required>
    <br>
    <button type="submit">Create Invoice</button>
</form>