<?php

namespace App\Http\Livewire\Contacts;

use App\Models\Company;
use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;


class Details extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $listeners = ['deleteConfirmed' => 'deleteData'];
    public $first_name, $last_name, $updateData = false, $addData = false, $dataId = null;
    public $contactId;
    public $employee_number;
    public $designation;
    public $department;
    public $phone_work;
    public $phone_personal;
    public $email_work;
    public $photo;
    public $email_personal;
    public $fax;
    public $key_itineraries;
    public $address;
    public $status = 1;
    public $itineraries = [];
    public $company_id;
    public $companies;

    public function render()
    {
        return view('livewire.contacts.details', [
            'contacts' => Contact::paginate(20),
        ]);
    }

    public function resetFields()
    {
        $this->itineraries = [];
    }

    public function changeStatus($id)
    {
        // Find the destination with the given ID
        $service = Contact::find($id);

        // Update the status of the destination
        $service->status = !$service->status;
        $service->save();

        // Refresh the page to show the updated status
        $this->mount();
    }


    public function removeFeature($index)
    {
        array_splice($this->features, $index, 1);
    }

    public function addItinerary()
    {
        $this->itineraries[] = '';
    }



    public function removeItinerary($index)
    {
        array_splice($this->itineraries, $index, 1);
    }


    public function storePost()
    {
        $validatedData = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'employee_number' => '',
            'designation' => '',
            'department' => '',
            'phone_work' => '',
            'phone_personal' => '',
            'email_work' => '',
            'photo' => '',
            'email_personal' => '',
            'fax' => '',
            'company_id' => 'required',
        ]);

        if ($this->photo) {
            if (!is_string($this->photo)) {
                $save = $this->photo->store('images', 'public');
                $validatedData['photo'] = $save;
            }
        }


        $validatedData['uuid'] = Str::uuid();

        try {

            Contact::create($validatedData);
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
            $service = Contact::findOrFail($id);
            if (!$service) {
                $this->dispatchBrowserEvent('show-update-error');
            } else {

                $this->contactId = $service->id;
                $this->first_name = $service->first_name;
                $this->last_name = $service->last_name;

                $this->company_id = $service->company_id;
                // $this->key_itineraries = json_decode($service->key_itineraries);
                // $this->itineraries  = $this->key_itineraries;

                $this->updateData();
            }
        } catch (\Exception $ex) {
            $this->dispatchBrowserEvent('show-update-error');
        }
    }



    public function updatePost()
    {
        $validatedData = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'employee_number' => '',
            'designation' => '',
            'department' => '',
            'phone_work' => '',
            'phone_personal' => '',
            'email_work' => '',
            'photo' => '',
            'email_personal' => '',
            'fax' => '',
            'company_id' => 'required',

        ]);

        if ($this->photo) {
            if (!is_string($this->photo)) {
                $save = $this->photo->store('images', 'public');
                $validatedData['photo'] = $save;
            }
        }

        // $validatedData['key_itineraries'] = json_encode($this->itineraries);
        try {
            Contact::whereId($this->contactId)->update($validatedData);
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
        $this->companies =  Company::whereStatus(1)->get();
    }

    public function updateData()
    {

        $this->updateData = true;
        $this->addData = false;
        $this->companies =  Company::whereStatus(1)->get();
    }


    public function confirmData($dataId)
    {
        $this->dataId = $dataId;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteData()
    {
        $data = Contact::findOrFail($this->dataId);
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
