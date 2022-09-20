<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Contact;
use Illuminate\Support\Facades\Http;
use App\Rules\ReCaptcha;
use Illuminate\Support\Facades\Mail;
use App\Mail\contacts;

class Posts extends Component
{
    public $posts, $name, $email, $subject, $body, $post_id, $g_recaptcha_response;
    public $updateMode = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->posts = Contact::all();
        return view('livewire.posts');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->subject = '';
        $this->body = '';
    }

    protected $messages = [
        'email.required' => 'The Email Address cannot be empty.',
        'email.email' => 'The Email Address format is not valid.',
        'g_recaptcha_response.required' => 'The Google Recaptcha is required.',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        // validate recaptcha
        /* $this->validate([
            'g_recaptcha_response' => ['required', new ReCaptcha]
        ]); */
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'body' => 'required',
            // 'g_recaptcha_response' => new ReCaptcha,
        ]);


        Contact::create($validatedDate);
        // send email to admin
        Mail::to('contact@fastmovies1.com')->send(new contacts($this->name, $this->email, $this->subject, $this->body));

        session()->flash('message', 'Message Successfully Sent.');

        $this->resetInputFields();
    }

    // google recaptcha
    public $captcha = 0;

    public function updatedCaptcha($token)
    {
        $response = Http::post('https://www.google.com/recaptcha/api/siteverify?secret=' . env('CAPTCHA_SECRET_KEY') . '&response=' . $token);
        $this->captcha = $response->json()['score'];

        if (!$this->captcha > .3) {
            $this->store();
        } else {
            return session()->flash('success', 'Google thinks you are a bot, please refresh and try again');
        }
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $post = Contact::findOrFail($id);
        $this->post_id = $id;
        $this->title = $post->title;
        $this->body = $post->body;

        $this->updateMode = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'body' => 'required',
        ]);

        $post = Contact::find($this->post_id);
        $post->update([
            'name' => $this->title,
            'email' => $this->body,
            'subject' => $this->body,
            'body' => $this->body,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Post Updated Successfully.');
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Contact::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }
}
