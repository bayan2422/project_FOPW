<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="styles.css">
	<script>
	function getUrlVars() {
  var vars = {};
  var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
      vars[key] = value;
  });
  return vars;
  }
  var var1 = getUrlVars()["var"];
  </script>
</head>
<body>
    <header>
        <h1>Your Cart</h1>
    </header>

    <main>
        <section id="cart-items" class="cart-section">
            <h2>Selected Items</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        session_start();
                        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                            echo '<tr><td colspan="2">Your cart is empty.</td></tr>';
                        } else {
                            foreach ($_SESSION['cart'] as $item) {
                                echo '<tr><td>' . htmlspecialchars($item['name']) . '</td><td>' . (int)$item['quantity'] . '</td></tr>';
                            }
                        }
                    ?>
                </tbody>
            </table>
        </section>

        <form method="POST">
            <label for="product">Product Name:</label>
            <input type="text" id="product" name="product" required>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" required>
            <button type="submit" name="add">Add to Cart</button>
        </form>

        <form method="POST">
            <button type="submit" name="purchase">Purchase</button>
        </form>

        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['add'])) {
                    $product = htmlspecialchars($_POST['product']);
                    $quantity = (int)$_POST['quantity'];

                    if (!isset($_SESSION['cart'])) {
                        $_SESSION['cart'] = [];
                    }

                    $_SESSION['cart'][] = [
                        'name' => $product,
                        'quantity' => $quantity
                    ];
                }

                if (isset($_POST['purchase'])) {
                    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                        echo '<script>alert("Your cart is empty.");</script>';
                    } else {
                        echo '<script>alert("Thank you for your purchase!");</script>';
                        unset($_SESSION['cart']); // Clear cart after purchase
                    }
                }
            }
        ?>
    </main>
</body>
</html>


