<?php

namespace App\Http\Livewire\Companies;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;


class Details extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $listeners = ['deleteConfirmed' => 'deleteData'];
    public $name, $phone,$email,$address,$instagram,$youtube,$facebook,$website,$twitter,$linkedin, $updateData = false, $addData = false, $dataId = null;
    public $companyId;
    public $status = 1; 
    public $image;

    public function render()
    {

        return view('livewire.companies.details', [
            'companies' => Company::paginate(20),
        ]);
    }

    public function changeStatus($id)
    {
        // Find the destination with the given ID
        $serviceType = Company::find($id);
        $serviceType->status = !$serviceType->status;
        $serviceType->save();
        $this->mount();
    }

    public function resetFields()
    {
        $this->name = '';
        $this->name =  '';
        $this->image =  '';
        $this->phone=  '';
        $this->email= '';
        $this->address= '';
        $this->instagram= '';
        $this->youtube= '';
        $this->facebook= '';
        $this->website= '';
        $this->twitter= '';
        $this->linkedin= '';
        $this->companyId = '';
    }

    public function storePost()
    {
      
        $validatedData = $this->validate([
            'name' => 'required',
            'image' => '',
            'phone'=> '',
            'email'=>'',
            'address'=>'',
            'instagram'=>'',
            'youtube'=>'',
            'facebook'=>'',
            'website'=>'',
            'twitter'=>'',
            'linkedin'=>'',
           
        ]);
    
        if($this->image){
            if(!is_string($this->image)){
                $save = $this->image->store('images', 'public');
                $validatedData['image'] = $save;
            }
        }
        
        try {
            Company::create($validatedData);
            $this->dispatchBrowserEvent('show-create-success');
            $this->resetFields();
            $this->addData = false;
        } catch (\Exception $ex) {
            $this->dispatchBrowserEvent('show-create-error');
        }
    }


    public function editPost($id)
    {
        try {
            $company = Company::findOrFail($id);
            if (!$company) {
                $this->dispatchBrowserEvent('show-update-error');
                //   session()->flash('error','Post not found');
            } else {
                $this->name = $company->name;
                $this->image = $company->image;
                $this->phone= $company->phone;
                $this->email=$company->email;
                $this->address=$company->address;
                $this->instagram=$company->instagram;
                $this->youtube=$company->youtube;
                $this->facebook=$company->facebook;
                $this->website=$company->website;
                $this->twitter=$company->twitter;
                $this->linkedin=$company->linkedin;
                $this->companyId = $company->id;
                $this->updateData = true;
                $this->addData = false;
            }
        } catch (\Exception $ex) {
            $this->dispatchBrowserEvent('show-update-error');
        }
    }

    public function updatePost()
    {
       
        $validatedData = $this->validate([
            'name' => 'required',
            'phone'=> '',
            'email'=>'',
            'address'=>'',
            'instagram'=>'',
            'youtube'=>'',
            'facebook'=>'',
            'website'=>'',
            'twitter'=>'',
            'linkedin'=>'',
        ]);
        
        if($this->image){
            if(!is_string($this->image)){
                $save = $this->image->store('images', 'public');
                $validatedData['image'] = $save;
            }
        }

        try {
            Company::whereId($this->companyId)->update($validatedData);
            $this->dispatchBrowserEvent('show-update-success');
            $this->resetFields();
            $this->updateData = false;
        } catch (\Exception $ex) {
            $this->dispatchBrowserEvent('show-update-error');
        }
    }

    public function cancelPost()
    {
        $this->addData = false;
        $this->updateData = false;
        $this->resetFields();
    }

    public function addPost()
    {
        $this->resetFields();
        $this->addData = true;
        $this->updateData = false;
        
    }

    public function confirmData($dataId)
    {
        $this->dataId = $dataId;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteData()
    {
        $data = Company::findOrFail($this->dataId);
        $data->delete();
        $this->dispatchBrowserEvent('deleted');
        $this->resetPage();
    }

    public function viewData($id)
    {
        try {
            return redirect()->route('company.view', ['id' => $id, 'viewflag' => 1]);
        } catch (\Exception $ex) {
            session()->flash('error', 'Something goes wrong!!');
        }
    }
}
