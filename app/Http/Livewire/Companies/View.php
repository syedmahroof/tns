<?php

namespace App\Http\Livewire\Manufactures;

use App\Models\Manufacture;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;   


class View extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $listeners = ['deleteConfirmed' => 'deleteData'];
    public $dataId = null;
    public $manufactureId, $updateFirm = false, $addFirm = false;
  
    public function render()
    {
        return view('livewire.manufactures.view');
    }

}
