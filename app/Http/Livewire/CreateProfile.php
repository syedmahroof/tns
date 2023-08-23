<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Profile;
use Livewire\WithFileUploads;

class CreateProfile extends Component
{
    use WithFileUploads;

    public $meta_title;
    public $key_words;
    public $meta_description;
    public $instagram;
    public $facebook;
    public $linkedin;
    public $twitter;
    public $tiktok;
    public $youtube;
    public $additional_seo_code;
    public $additional_css_code;
    public $additional_js_code;
    public $banner_text;
    public $banner_image_1;
    public $banner_image_2;
    public $banner_image_3;
    public $banner_image_4;
    public $phone;
    public $mail;
    public $address;
    public $profile;
    public $footer_text;
    

    public $isUploaded = false;

    protected $listeners = ['resetFrom' => 'loadData'];

    public function submit()
    {

        $validatedData = $this->validate([
            'meta_title' => '',
            'key_words' => '',
            'meta_description' => '',
            'instagram' => '',
            'facebook' => '',
            'linkedin' => '',
            'twitter' => '',
            'tiktok' => '',
            'youtube' => '',
            'additional_seo_code' => '',
            'additional_css_code' => '',
            'additional_js_code' => '',
            'banner_text' => '',
            'banner_image_1' => '',
            'banner_image_2' => '',
            'banner_image_3' => '',
            'banner_image_4' => '',
            'phone' => '',
            'mail' => '',
            'address' => '',
            'footer_text'  => '',

        ]);

        if ($this->banner_image_1) {
            if (!is_string($this->banner_image_1)) {
                $save = $this->banner_image_1->store('images', 'public');
                $validatedData['banner_image_1'] = $save;
            }
        }

        if ($this->banner_image_2) {
            if (!is_string($this->banner_image_2)) {
                $save = $this->banner_image_2->store('images', 'public');
                $validatedData['banner_image_2'] = $save;
            }
        }

        if ($this->banner_image_3) {
            if (!is_string($this->banner_image_3)) {
                $save = $this->banner_image_3->store('images', 'public');
                $validatedData['banner_image_3'] = $save;
            }
        }

        if ($this->banner_image_4) {
            if (!is_string($this->banner_image_4)) {
                $save = $this->banner_image_4->store('images', 'public');
                $validatedData['banner_image_4'] = $save;
            }
        }


        Profile::firstOrCreate()->update($validatedData);
        $this->dispatchBrowserEvent('show-update-success');
    }

    public function mount($id = null, $viewFlag = 0)
    {

        $this->meta_title;
        $this->key_words;
        $this->meta_description;
        $this->instagram;
        $this->facebook;
        $this->linkedin;
        $this->twitter;
        $this->tiktok;
        $this->youtube;
        $this->additional_seo_code;
        $this->additional_css_code;
        $this->additional_js_code;
        $this->banner_text;
        $this->banner_image_1;
        $this->banner_image_2;
        $this->banner_image_3;
        $this->banner_image_4;
        $this->phone;
        $this->mail;
        $this->address;
        $this->footer_text;
        $this->loadData();
    }

    public function loadData()
    {

        $this->profile = Profile::first();
        if (!empty($this->profile)) {
            $this->meta_title = $this->profile->meta_title;
            $this->key_words = $this->profile->key_words;
            $this->meta_description = $this->profile->meta_description;
            $this->instagram = $this->profile->instagram;
            $this->facebook = $this->profile->facebook;
            $this->linkedin = $this->profile->linkedin;
            $this->tiktok = $this->profile->tiktok;
            $this->youtube = $this->profile->youtube;
            $this->twitter = $this->profile->twitter;
            $this->additional_seo_code = $this->profile->additional_seo_code;
            $this->additional_css_code = $this->profile->additional_css_code;
            $this->additional_js_code = $this->profile->additional_js_code;
            $this->banner_text = $this->profile->banner_text;
            $this->banner_image_1 = $this->profile->banner_image_1;
            $this->banner_image_2 = $this->profile->banner_image_2;
            $this->banner_image_3 = $this->profile->banner_image_3;
            $this->banner_image_4 = $this->profile->banner_image_4;
            $this->phone = $this->profile->phone;
            $this->mail = $this->profile->mail;
            $this->address = $this->profile->address;
            $this->footer_text = $this->profile->footer_text;
        } else {
            $this->meta_title = "";
            $this->key_words = "";
            $this->meta_description = "";
            $this->instagram = "";
            $this->facebook = "";
            $this->linkedin = "";
            $this->twitter = "";
            $this->additional_seo_code = "";
            $this->additional_css_code = "";
            $this->additional_js_code = "";
            $this->banner_text = "";
            $this->banner_image_1 = "";
            $this->banner_image_2 = "";
            $this->banner_image_3 = "";
            $this->banner_image_4 = "";
            $this->phone = "";
            $this->mail = "";
            $this->address = "";
            $this->tiktok = "";
            $this->youtube =  "";
            $this->footer_text = "";
        }
    }

    public function render()
    {
        return view('livewire.create-profile');
    }
}
