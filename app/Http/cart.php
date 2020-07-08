<?php
    namespace App;
    class cart {
        public $item=null;
        public $totalQuantity=0;
        public $totalPrice=0;

        public function _constructor($oldcart)
        {
            $this->item=$oldcart->item;
            $this->totalQuantity=$oldcart->totalQuantity;
            $this->totalPrice=$oldcart->totalPrice;
            # code...
        }

    }
?>