<?php

namespace App\Http\Livewire;
use App\Models\stock as stocks;
use Livewire\Component;

class Products extends Component
{
    public $orderProducts = [];
    public $getName = [];
    public $sellType = ['received' => 'Reserved' , 'packed' => 'Ready to sent' , 'sent' => 'Sent'];
    
    public function mount()
    {
        $this->getName = stocks::distinct()->pluck('itemname');
        $this->orderProducts = [
            ['index' => '' , 'quantity' => 1]
    ];

    }

    public function addProduct()
    {
        $this->orderProducts[] = [
            ['index' => '' , 'quantity' => 1]
    ];
   
    }

    public function removeProduct($id)
    {
        //dd($this->orderProducts[$id]);
         unset($this->orderProducts[$id]);
         array_values($this->orderProducts);

    }
    public function render()
    {
        
        return view('livewire.products')->extends('liveware');
    }
}
