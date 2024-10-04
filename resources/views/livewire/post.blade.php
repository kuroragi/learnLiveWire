<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
    </div>

    <div class="card-body">
        <button class="btn btn-sm btn-outline-primary mb-3" data-toggle="modal" data-target="#postModal"
            wire:click='ResetField'><i class="fa fa-plus"></i> Tambah Post</button>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>image(s)</th>
                    <th>Content</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->content_title }}</td>
                        <td><img src="/storage/{{ $post->header_image }}" width="100" height="100"
                                style="object-fit:contain;" alt=""></td>
                        <td>
                            <button wire:click='EditPost({{ $post->id }})' class="btn btn-outline-warning btn-sm"
                                title="Edit" data-toggle="modal" data-target="#postModal">Edit <i
                                    class="fa fa-edit"></i></button>
                            <a href="/post-detail/{{ $post->id }}"><button class="btn btn-outline-info btn-sm"
                                    title="Detail">Detail <i class="fa fa-search"></i></button></a>
                            <button wire:click='DeletePost({{ $post->id }})' class="btn btn-outline-danger btn-sm"
                                title="Detail">Hapus <i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Image(s)</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <div wire:ignore.self class="modal fade" id="postModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Extra Large Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent='savePost'>
                        <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                            x-on:livewire-upload-finish="uploading = false"
                            x-on:livewire-upload-cancel="uploading = false"
                            x-on:livewire-upload-error="uploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                            <div class="mb-3">
                                <label for="content_title" class="form-label">Title</label>
                                <input wire:model='content_title' type="text" name="content_title" id="content_title"
                                    class="form-control">
                                @error('content_title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3" wire:ignore>
                                <label for="content" class="form-label">Content</label>
                                <input wire:model.lazy='content' type="hidden" name="content" id="content">
                                <trix-editor input="content" id="trixEditor"></trix-editor>
                                @error('content')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="header_image" class="form-label">Header Image</label>
                                <div class="mb-2">
                                    @if ($header_image instanceof \Livewire\TemporaryUploadedFile)
                                        <img src="{{ $header_image->temporaryUrl() }}" width="250" height="250"
                                            style="object-fit:contain;" alt="">
                                    @elseif($header_image)
                                        <img src="/storage/{{ $header_image }}" width="250" height="250"
                                            style="object-fit:contain;" alt="">
                                    @endif
                                </div>
                                <div class="input-group">
                                    <input wire:model='header_image' type="file" name="header_image"
                                        id="header_image" class="custom-file-input">
                                    <label for="" class="custom-file-label">Browse</label>
                                </div>
                                @error('header_image')
                                    <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                                <!-- Progress Bar -->
                                <div x-show="uploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success w-100"><i class="fa fa-floppy-disk"></i>
                                Simpan</button>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    {{-- <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Extra Large Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit='UpdatePost'>
                        <div class="mb-3">
                            <label for="add_content_title" class="form-label">Title</label>
                            <input wire:model='postId' type="hidden" name="postId" id="edit_postId">
                            <input wire:model='content_title' type="text" name="content_title"
                                id="edit_content_title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="edit_content" class="form-label">Content</label>
                            <input wire:model='content' type="hidden" name="content" id="edit_content">
                            <trix-editor input="edit_content"></trix-editor>
                        </div>
                        <div class="mb-3">
                            <label for="edit_header_image" class="form-label">Header Image</label>
                            <input wire:model='header_image' type="text" name="header_image"
                                id="edit_header_image" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success w-100"><i class="fa fa-floppy-disk"></i>
                            Simpan</button>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div> --}}
</div>

@push('scripts')
    <script>
        Livewire.on('closeModal', () => {
            $("#postModal").modal('hide');
        });

        Livewire.on('editModal', () => {
            setTimeout(() => {
                let trixEditor = $('#trixEditor');
                let content = $('#content');

                trixEditor.html(content.val());
            }, 10);

        });

        Livewire.on('resetField', () => {
            $("#trixEditor").html("");
        })

        // Mendengarkan event `trix-change` untuk sinkronisasi data Trix dengan Livewire
        document.addEventListener('trix-change', function(e) {
            @this.set('content', e.target.value);
        });

        document.addEventListener('trix-attachment-add', function(event) {

            if (event.attachment.file) {
                uploadImage(event.attachment);
            }
        });

        document.addEventListener('trix-attachment-remove', function(event) {
            removeImage(event.attachment);
        })

        function uploadImage(attachment) {

            if (attachment.file) {
                var formData = new FormData();
                formData.append('attachment', attachment.file);

                $.ajax({
                    url: '/attachments', // Endpoint for handling file upload
                    type: 'POST',
                    data: formData, // Mengirim FormData dengan file
                    contentType: false, // Ini penting agar FormData dapat mengelola tipe file
                    processData: false, // Mencegah jQuery mengubah data menjadi string
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token untuk keamanan
                    },
                    success: function(response) {

                        if (response.url) {
                            // Set the uploaded file's URL to Trix editor
                            attachment.setAttributes({
                                url: response.url,
                                href: response.url
                            });

                            console.log('url', response.url);


                            setTimeout(() => {
                                let editor = document.querySelector("trix-editor");
                                console.log(editor);
                                let img = editor.querySelector(`img[src='${response.url}']`);

                                if (img) {
                                    console.log('image found', img);

                                    img.classList.add("w-100", "px-5");
                                    img.style.objectFit = "contain";

                                }

                                let figure = $(img).closest('a');
                                if (figure) {

                                    let figcaption = figure[0].querySelector('figcaption');
                                    if (figcaption) {
                                        $(figcaption).remove();
                                    }
                                }

                            }, 1000)



                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Upload error:', error); // Menangani error upload
                    }
                });
            }
        }

        function removeImage(attachment) {
            if (attachment.getAttribute('url')) {
                let fileUrl = attachment.getAttribute('url');

                $.ajax({
                    type: "POST",
                    url: "/attachments/delete",
                    data: {
                        file_url: fileUrl
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token untuk keamanan
                    },
                    success: function(response) {
                        console.log(response);

                        console.log('Data removed Successfully');

                    },
                    error: function(xhr, status, error) {
                        console.error('Remove error:', error); // Menangani error upload
                    }
                });
            }
        }
    </script>
@endpush
