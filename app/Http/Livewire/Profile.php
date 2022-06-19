<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Profile extends Component
{
    public $success = false;
    public User $user;
    public $showHelp = false; // lo setto direttamente con $toggle, $set senza bisogno di creare il metodo apposito

    protected $rules = [
        'user.name' => 'min:3',
        'user.email' => 'email',
    ];

    public function mount() // è una sorta di __construct
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.profile');
    }

    public function updateprofile()
    {
        $this->validate(); // le rules posso anche scriverle direttamente qui dentro

        $this->user->save();

        $this->success = true;

        $this->emit('profileUpdated');
    }

//    public function updated($name, $value)
    public function updatedUserName($value) // Livewire Hooks: si agganciano a degli eventi (es:updated)
    {
        $this->validateOnly('user.name'); // le rules posso anche scriverle direttamente qui dentro
    }

}
