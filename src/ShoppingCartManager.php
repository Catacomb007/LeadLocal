<?php

//Taken from week_7 lecture B
//require_once('DBConnector.php');

//$um = new ShoppingCartManager();

// Facade
class ShoppingCartManager {

    private $db;

    public function __construct() {
        $this->db = DBConnector::getInstance();
    }

    public function startCart() {
        $sql = "INSERT INTO cart (state, total) values ('started', 0.00)";
        $id = $this->db->getTransactionID($sql);
        // return id of the cart that was started
        return $id;
    }

    public function cancelCart($id) {
        $sql = "UPDATE cart SET state = 'cancelled' WHERE ID = $id";
        $count = $this->db->affectRows($sql);
        return $count;
    }

    public function checkoutCart($id) {
        $sql = "UPDATE cart SET state = 'checked out' WHERE ID = $id";
        $count = $this->db->affectRows($sql);
        return $count;
    }

    public function editCart($items, $cart_id, $new_qty) {
        
        foreach($items as $item) {
            $sku = $item['sku'];

            // need to look up the ID of the product based on the SKU
            $sql = "SELECT ID FROM product WHERE SKU = '$sku'";
            $rows = $this->db->query($sql);
            $product_id = $rows[0]['ID'];

            $sql = "SELECT * FROM cart_product where product_id = $product_id";
            $isset = $this->db->query($sql);

            $sql = "UPDATE cart_product SET quantity $new_qty WHERE product_id = $product_id AND cart_id = $cart_id";

            $this->db->affectRows($sql);

        }}

    public function addItemsToCart($items, $cart_id) {
        
        foreach($items as $item) {
            $sku = $item['sku'];
            $qty = $item['qty'];

            // need to look up the ID of the product based on the SKU
            $sql = "SELECT ID FROM product WHERE SKU = '$sku'";
            $rows = $this->db->query($sql);
            $product_id = $rows[0]['ID'];
            $sql = "SELECT * FROM cart_product where product_id = $product_id";

            $isset = $this->db->query($sql);

            $sql = "INSERT INTO cart_product (product_id, cart_id, quantity)
                VALUES ($product_id, $cart_id, $qty)";
            $this->db->affectRows($sql);
        }

    }

    public function removeItemsFromCart($item, $cart_id){

        $sku = $item['sku'];
        $qty = $item['qty'];

        // need to look up the ID of the product based on the SKU
        $sql = "SELECT ID FROM product WHERE SKU = '$sku'";
        $rows = $this->db->query($sql);
        $product_id = $rows[0]['ID'];
        $sql = "SELECT * FROM cart_product where product_id = $product_id";

        $isset = $this->db->query($sql);

        console.log($isset);

        $sql = "DELETE FROM cart_product WHERE product_id = $product_id AND cart_id = $cart_id";
        $rowcount = $this->db->affectRows($sql);
    }
}

?>
