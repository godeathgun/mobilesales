<?php
    namespace App;
    class Cart {
        public $items=null;
        public $totalQuantity=0;
        public $totalPrice=0;

        public function __construct($oldcart)
        {
            if($oldcart)
            {
                $this->items=$oldcart->items;
                $this->totalQuantity=$oldcart->totalQuantity;
                $this->totalPrice=$oldcart->totalPrice;
                # code...
            }
        }

        public function add($item, $ProductID)
        {
            $storedItem = ['qty'=>0, 'product_id'=> 0, 'product_name'=>$item->ProductName,
             'product_price'=>$item->Price, 'product_image'=>$item->Image0, 'item'=>$item];

            if($this->items){
                if(array_key_exists($ProductID, $this->items)){
                    $storedItem = $this->items[$ProductID];
                }
            }

            $storedItem['qty'] +=1;
            $storedItem['product_id'] = $item->ProductID;
            $storedItem['product_name'] = $item->ProductName;
            $storedItem['product_price'] = $item->Price;
            $storedItem['image'] = $item->Image0;
            
            $this->totalQuantity += 1;
            $this->totalPrice += $item->Price;
            $this->items[$ProductID] = $storedItem;
        }

        public function updateCart($id, $qty){
            $this->totalQuantity -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['product_price'] * $this->items[$id]['qty'];
            $this->items[$id]['qty'] = $qty;
            $this->totalQuantity += $qty;
            $this->totalPrice += $this->items[$id]['product_price'] * $qty;

        }

        public function removeItem($id){
            $this->totalQuantity -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['product_price'] * $this->items[$id]['qty'];
            unset($this->items[$id]);
        }
    }
?>