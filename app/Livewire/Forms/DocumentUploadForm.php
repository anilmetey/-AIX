<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;

class DocumentUploadForm extends Form
{
    #[Validate('required|file|mimes:pdf|max:10240')]
    public $document;
}
