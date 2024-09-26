<?php

namespace App\Livewire;

use App\Models\Posts;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Post extends Component
{
    public $page_title = 'DataTables Post';

    public $postId;

    #[Validate('required|min:3')]
    public $content_title;

    #[Validate('required')]
    public $content;

    // #[Validate('image|max:12040')]
    public $header_image;

    public $listener = ['closeModal', 'editPost'];

    public function CreatePost(){
        $validated = $this->validate();
        $createPost = Posts::create([
            'content_title' => $validated['content_title'],
            'content' => $validated['content'],
            'header_image' => $this->header_image,
        ]);

        if($createPost){
            $this->reset(['content_title', 'content', 'header_image']);
            session()->flash('success', 'Berhasil Tambah Post.');
            $this->dispatch('closeModal');
        }

    }

    public function EditPost($id){
        $post = Posts::findOrFail($id);
        
        if($post){
            $this->postId = $id;
            $this->content_title = $post->content_title;
            $this->content = $post->content;
            $this->header_image = $post->header_image;
            $this->dispatch('editPost');
        }
    }

    public function UpdatePost(){
        $validated = $this->validate();

        $data = [
            'content_title' => $validated['content_title'],
            'content' => $validated['content'],
            'header_image' => $this->header_image,
        ];

        $updatePost = Posts::findOrFail($this->postId)->update($data);

        if($updatePost){
            $this->reset(['postId', 'content_title', 'content', 'header_image']);
            session()->flash('success', 'Berhasil Tambah Post.');
            $this->dispatch('closeModal');
        }

    }

    public function DeletePost($id){
        if($id){
            Posts::destroy($id);
        }
    }

    public function render()
    {

        $posts = Posts::orderBy('created_at', 'Desc')->get();
        // dd($posts);
        return view('livewire.post', [
            'posts' => $posts
        ]);
    }
}
