<?php

namespace App\Livewire;

use App\Models\Posts;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Post extends Component
{
    public $page_title = 'DataTables Post';

    #[Validate('required|min:6')]
    public $content_title;

    #[Validate('required')]
    public $content;

    // #[Validate('image|max:12040')]
    public $header_image;

    public function CreatePost(){
        $validated = $this->validate();
        Posts::create([
            'content_title' => $validated('content_title'),
            'content' => $validated('content'),
            'header_image' => $this->header_image,
        ]);

        $this->reset(['content_title', 'content', 'header_image']);
    }

    public function render()
    {

        $posts = Posts::orderBy('created_at', 'Desc');
        return view('livewire.post', [
            'posts' => $posts
        ]);
    }
}
