<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;

class ChatForm extends Form
{
    #[Validate('required|string')]
    public $newMessage = '';

    #[Validate('required|in:gpt-3.5-turbo,gpt-4o')]
    public $aiModel = 'gpt-3.5-turbo';
}
