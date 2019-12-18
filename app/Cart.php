<?php
class Cart
{
    public $items;
    public $totalQuantity;
    public $totalPrice;

    // Cart construction
    public function __construct($prevCart)
    {
        if($prevCart != null) {
            $this->items         = $prevCart->items;
            $this->totalQuantity = $prevCart->totalQuantity;
            $this->totalPrice    = $prevCart->totalPrice;
        } else {
            $this->items = [];
            $this->totalQuantity = 0;
            $this->totalPrice = 0;
        }
    }

    public function addItem($id, $product) {
        $price = (int) str_replace("$", "", $product->price);

        // the item already exist
        if(array_key_exists($id, $this->items)) {
            $productToAdd = $this->items[$id];
            $productToAdd['quantity']++;
            $productToAdd['totalPrice'] = $productToAdd['quantity'] * $price;

            // first time to add this item
        } else {
            $productToAdd = ['quantity' => 1, 'totalPrice' => $price, 'data' => $product];
        }

        $this->items[$id] = $productToAdd;
        $this->totalQuantity++;
        $this->totalPrice = $this->totalPrice + $price;

    }

}
?>
