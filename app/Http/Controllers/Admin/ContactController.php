<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactSocialMedia;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.pages.contacts.index');
    }



public function getContacts()
{
    $contacts = Contact::select(['id', 'first_name', 'last_name', 'email_work', 'status']);

    return DataTables::of($contacts)
        ->addColumn('actions', function ($contact) {
            // Add your actions buttons here
        })
        ->addColumn('status', function ($contact) {
            // Add your status column logic here
        })
        ->rawColumns(['actions', 'status'])
        ->toJson();
}

    public function changeStatus(Contact $contact)
    {
        $contact->status = $contact->status === 1 ? 0 : 1;
        $contact->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Contact status changed successfully.'
        ]);
}

    public function create()
    {
        return view('admin.pages.contacts.create');
    }

    public function store(Request $request)
    {
        $validatedContactData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'designation' => 'required',
            'phone_work' => 'required',
            'phone_personal' => 'required',
            'email_work' => 'required|email',
            'website' => 'nullable|url',
            'address' => 'nullable',
            'background_color' => 'nullable',
        ]);
    
        $contact = Contact::create($validatedContactData);
    
        $socialMediaData = $request->input('social_media', []); // Assuming the input name is 'social_media'
    
        foreach ($socialMediaData as $socialMedia) {
            $contact->socialMedia()->create([
                'platform' => $socialMedia['platform'],
                'username' => $socialMedia['username'],
                'link' => $socialMedia['link'],
                'icon' => $socialMedia['icon'],
            ]);
        }
    
        return redirect()->route('admin.contacts.index')
            ->with('success', 'Contact created successfully.');
    }
    

    public function show(Contact $contact)
    {
        return view('admin.pages.contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        return view('admin.pages.contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'designation' => 'required',
            'phone_work' => 'required',
            'phone_personal' => 'required',
            'email_work' => 'required|email',
            'website' => 'nullable|url',
            'address' => 'nullable',
            'background_color' => 'nullable',
        ]);
    
        $contact->update([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'designation' => $validatedData['designation'],
            'phone_work' => $validatedData['phone_work'],
            'phone_personal' => $validatedData['phone_personal'],
            'email_work' => $validatedData['email_work'],
            'website' => $validatedData['website'],
            'address' => $validatedData['address'],
            'background_color' => $validatedData['background_color'],
        ]);
    
        $socialMediaData = $request['social_media'];
    
        $existingSocialMediaIds = $contact->socialMedia->pluck('id')->toArray();
    
        foreach ($socialMediaData as $index => $data) {
            if (isset($data['id'])) {
                $socialMedia = ContactSocialMedia::find($data['id']);
                if ($socialMedia) {
                    $socialMedia->update([
                        'platform' => $data['platform'],
                        'username' => $data['username'],
                        'link' => $data['link'],
                        'icon' => $data['icon'],
                    ]);
                    // Remove this id from the array, as it's still present in the form
                    $existingSocialMediaIds = array_diff($existingSocialMediaIds, [$data['id']]);
                } else {
                    dd("Social media record not found for ID: " . $data['id']);
                }
            } else {
                $contact->socialMedia()->create([
                    'platform' => $data['platform'],
                    'username' => $data['username'],
                    'link' => $data['link'],
                    'icon' => $data['icon'],
                ]);
            }
        }
    
        // Delete social media entries that were not present in the form
        ContactSocialMedia::whereIn('id', $existingSocialMediaIds)->delete();
    
        return redirect()->route('admin.contacts.index')
            ->with('success', 'Contact updated successfully.');
    }

    

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.pages.contacts.index')
            ->with('success', 'Contact deleted successfully.');
    }
}
