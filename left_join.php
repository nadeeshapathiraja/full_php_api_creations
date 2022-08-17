<?php

// SELECT column_name(s)
// FROM table1
// INNER JOIN table2
// ON table1.column_name = table2.column_name;


require 'database.php';

$policies = [];

$sql ="SELECT Orders.OrderID, Customers.CustomerName FROM Orders LEFT JOIN Customers ON Orders.CustomerID = Customers.CustomerID";


//Table 1 = Orders
// table 2 + Customers
// table 1 primary key compare table 2 forigne key = Orders.CustomerID = Customers.CustomerID

?>