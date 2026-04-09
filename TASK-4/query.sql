SELECT c.name, p.name, o.quantity, (p.price * o.quantity) AS total
FROM Orders o
JOIN Customers c ON o.customer_id = c.id
JOIN Products p ON o.product_id = p.id
ORDER BY total DESC;

SELECT * FROM Orders
WHERE (quantity * (SELECT price FROM Products WHERE id = product_id)) =
(SELECT MAX(quantity * price) FROM Orders o JOIN Products p ON o.product_id = p.id);

SELECT customer_id, COUNT(*) as total_orders
FROM Orders
GROUP BY customer_id
ORDER BY total_orders DESC
LIMIT 1;
