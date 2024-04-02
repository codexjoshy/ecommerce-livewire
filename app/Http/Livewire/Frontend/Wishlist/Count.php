<?php

namespace App\Http\Livewire\Frontend\Wishlist;

use Livewire\Component;

class Count extends Component
{
    public $count = 0;
    protected $listeners = ['updateWislistCount' => 'wislistCount'];

    public function wislistCount()
    {
        $userId = auth()->id();
        if ($userId) {
            return \App\Models\Whishlist::where(['user_id' => $userId, 'in_cart' => false])->count();
        }
        return 0;
    }
    public function render()
    {
        $this->count = $this->wislistCount();
        return view('livewire.frontend.wishlist.count', ['count' => $this->count]);
    }
}
