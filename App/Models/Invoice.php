<?php

namespace App\Models;

class Invoice
{
    private $pdo;

    // Constructor to initialize the PDO instance
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Get all invoices from the database
    public function getAllInvoices()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM invoices");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Get a single invoice by its ID
    public function getInvoiceById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM invoices WHERE id = :id");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    // Create a new invoice
    public function createInvoice($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO invoices (date, amount) VALUES (:date, :amount)");
        $stmt->bindParam(':date', $data['date']);
        $stmt->bindParam(':amount', $data['amount']);
        $stmt->execute();
    }

    // Delete an invoice by its ID
    public function deleteInvoice($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM invoices WHERE id = :id");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
    }
}