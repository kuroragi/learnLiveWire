<?php

namespace App\Livewire;

use App\Models\Posts;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Livewire\TemporaryUpdaloadedFile;

#[Title('Post')]
#[Layout('layouts.app', ['page_title' => 'Data Post'])]
class Post extends Component
{
    use WithFileUploads;

    public $title = 'Post';

    public $page_title = 'DataTables Post';
    public $posts;
    public $postId;

    #[Validate('required|min:3')]
    public $content_title;

    #[Validate('required')]
    public $content;

    #[Validate('nullable|image|max:12040')]
    public $header_image;

    public $isEditMode = false;

    public $listener = ['editAttachment', 'resetField', 'closeModal', 'editPost'];

    public function mount($id = null){
        $this->posts = Posts::orderBy('created_at', 'Desc')->get();
    }

    public function savePost(){
        // $this->dispatch('editAttachment');

        $validated = $this->validate([
            'content_title' => 'required|min:3',
            'content' => 'required',
        ]);

        if(is_string($this->header_image)){
            $path = $this->header_image;
        }else{
            $validated['header_image'] = 'image|max:12040';
        
            if($this->header_image instanceof TemporaryUploadedFile){
                $name = $this->header_image->getClientOriginalName();
                $path = $this->header_image->storeAs('header_image', $name, 'public');
            }
        }

        // Hapus seluruh tag <figcaption> beserta isinya
        $contentWithoutFigcaption = preg_replace('/<figcaption[^>]*>.*?<\/figcaption>/is', '', $this->content);
        
        // Hapus atribut width dari tag <img>
        $contentWithoutWidth = preg_replace('/<img([^>]*?)\swidth="[^"]*"([^>]*)>/i', '<img$1$3>', $contentWithoutFigcaption);

        // Hapus atribut height dari tag <img>
        $contentWithoutDimensions = preg_replace('/<img([^>]*?)\sheight="[^"]*"([^>]*)>/i', '<img$1$3>', $contentWithoutWidth);

        $modifiedContent = preg_replace(
            '/<img([^>]*)>/',
            '<img$1 class="w-100 py-3 px-5" style="object-fit: contain;" />',
            $contentWithoutDimensions
        );

        $data = [
            'content_title' => $validated['content_title'],
            'content' => $modifiedContent,
            'header_image' => $path,
        ];

        $createUpdatePost = Posts::updateOrCreate(
            ['id' => $this->postId], 
            $data
        );

        session()->flash('message', $this->isEditMode ? 'post berhasil di update' : 'post berhasil disimpan');

        if($createUpdatePost){
            $this->dispatch('closeModal');
            $this->ResetField();
        }
    }

    public function EditPost($id){
        $post = Posts::findOrFail($id);
        
        if($post){
            $this->postId = $id;
            $this->content_title = $post->content_title;
            $this->content = $post->content;
            $this->header_image = $post->header_image;
            $this->isEditMode = true;
            $this->dispatch('editModal');
        }
    }

    public function DeletePost($id){
        if($id){
            $post = Posts::findOrFail($id);

            if($post->header_image && Storage::disk('public')->exists($post->header_image)){
                Storage::disk('public')->delete($post->header_image);
            }

            $post->delete();

            session()->flash('message', 'Post Berhasil di hapus');

            $this->posts = Posts::orderBy('created_at', 'Desc')->get();
        }
    }

    public function ResetField(){
        $this->reset(['postId', 'content_title', 'content', 'header_image']);
        $this->isEditMode = false;
        $this->dispatch('resetField');
    }

    public function render()
    {

        // dd($this->posts);
        return view('livewire.post');
    }
}
