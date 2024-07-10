<?php

namespace App\Http\Livewire;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public $fullname, $email, $phone_number, $subject, $message;

    public function rules(){
        return(new ContactFormRequest())->rules();
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.contact-form')->layout('layouts.guest');
    }
    public function send(){
        $validated = $this->validate();
        Mail::to(get_settings()->site_email)->send(new ContactMail($validated));
        Contact::create([
            'fullname' => $this->fullname,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
            'status' => 'unread',
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('swal:modal', [
            "type" => 'success',
            "title" => 'Pesan Berhasil Terkirim!',
            "text" => 'Terima kasih telah menghubungi kami.',
        ]);
    }
}
