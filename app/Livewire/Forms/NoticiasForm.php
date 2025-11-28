<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class NoticiasForm extends Form
{
    #[Validate('required|min:5')]
    public $fullname,$documento;
    public $address,$email;
}
