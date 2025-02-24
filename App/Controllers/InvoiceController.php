<?php

namespace App\Controllers;

use App\Models\Invoice;

class InvoiceController
{
    private $pdo;

    // Constructor to initialize the PDO instance
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Display the invoices page
    public function index()
    {
        $invoiceModel = new Invoice($this->pdo);
        $invoices = $invoiceModel->getAllInvoices();
        require_once __DIR__ . '/../Views/invoices/index.php';
    }

    // View a specific invoice
    public function view($id)
    {
        $invoiceModel = new Invoice($this->pdo);
        $invoice = $invoiceModel->getInvoiceById($id);
        if ($invoice) {
            require_once __DIR__ . '/../Views/invoices/view.php';
        } else {
            echo "Invoice not found.";
        }
    }

    // Create a new invoice
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $invoiceModel = new Invoice($this->pdo);
            $invoiceModel->createInvoice($_POST);
            header('Location: index.php?route=invoices');
            exit();
        } else {
            require_once __DIR__ . '/../Views/invoices/create.php';
        }
    }

    // Delete an invoice
    public function delete($id)
    {
        $invoiceModel = new Invoice($this->pdo);
        $invoiceModel->deleteInvoice($id);
        header('Location: index.php?route=invoices');
        exit();
    }
}