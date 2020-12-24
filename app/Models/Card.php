<?php


namespace App\Models;


class Card
{
    public $items;
    public $totalPrice;
    /**
     * Card constructor.
     */
    public function __construct($prevCart)
    {

        if($prevCart!=null){
        $this->items=$prevCart->items;
        $this->totalPrice=$prevCart->totalPrice;
        }
        else{
            $this->items= [];
            $this->totalPrice=0;

        }
    }
    public function addItem($id,$game){
        $price=$game->price;


        if(array_key_exists($id,$this->items)){
            $gameToAdd=$this->items[$id];

        }
        else{
            $gameToAdd=['price'=>$price,'data'=>$game];
        }
        $this->items[$id]=$gameToAdd;
        $this->totalPrice=$this->totalPrice+$price;
    }
    public function updatePrice(){
        $totalPrice=0;
        foreach ($this->items as $item){
            $totalPrice=$totalPrice+ $item['price'];
        }
        $this->totalPrice=$totalPrice;
    }

}
