<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use App\Product;
use Illuminate\Http\Request;
class Cart
{
    public $item;
    public $totalQuality=0;
    public $totalPrice=0;
    public function __construct($oldCart)
    {
        if($oldCart)
        {
            $this->items= $oldCart->items;
            $this->totalQuality= $oldCart->totalQuality;
            $this->totalPrice= $oldCart->totalPrice;
        }
    }
    public function add($item,$id)
    {
        $storedItem =['qty'=>0,'price'=>$item->Price,'item'=>$item];
        if($this->item)
        {
            if(array_key_exists($id,$this->items))
            {
                $storedItem=$this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price']=$uem->price* $storedItem['qty'];
        $this->items[$id]=$storedItem;
        $this->totalQuality++;
        $this->totalPrice+=$item->price;
    }
}