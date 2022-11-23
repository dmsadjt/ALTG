@extends('layouts.admin')
@section('title', 'Add Post')
@section('contents')
    <div class="d-grid pill-dark p-2 m-3">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="mx-5 my-2">Add Post</h1>
        <form action="/admin/blogs/post" class="mx-5 p-1 d-grid gap-1" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label class="form-label altona-sans-12" for="name">Title</label>
                <input class="form-control" type="text" name="title" id="title">
            </div>

            <label class="form-label altona-sans-12 mt-2" for="body">Body</label>
            <div class="bg-white text-black border rounded p-2">

                <textarea id="editor" name="body"></textarea>
                <script>
                    class MyUploadAdapter {
                        constructor(loader) {
                            // The file loader instance to use during the upload.
                            this.loader = loader;
                        }

                        // Starts the upload process.
                        upload() {
                            // Update the loader's progress.
                            return this.loader.file
                                .then(file => new Promise((resolve, reject) => {
                                    this._initRequest();
                                    this._initListeners(resolve, reject, file);
                                    this._sendRequest(file);
                                }));


                        }

                        // Aborts the upload process.
                        abort() {
                            // Reject the promise returned from the upload() method.
                            if (this.xhr) {
                                this.xhr.abort();
                            }
                        }

                        _initRequest() {
                            const xhr = this.xhr = new XMLHttpRequest();

                            // Note that your request may look different. It is up to you and your editor
                            // integration to choose the right communication channel. This example uses
                            // a POST request with JSON as a data structure but your configuration
                            // could be different.
                            xhr.open('POST', '/admin/posts/image/post', true);
                            xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}')
                            xhr.responseType = 'json';
                        }

                        // Initializes XMLHttpRequest listeners.
                        _initListeners(resolve, reject, file) {
                            const xhr = this.xhr;
                            const loader = this.loader;
                            const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                            xhr.addEventListener('error', () => reject(genericErrorText));
                            xhr.addEventListener('abort', () => reject());
                            xhr.addEventListener('load', () => {
                                const response = xhr.response;

                                // This example assumes the XHR server's "response" object will come with
                                // an "error" which has its own "message" that can be passed to reject()
                                // in the upload promise.
                                //
                                // Your integration may handle upload errors in a different way so make sure
                                // it is done properly. The reject() function must be called when the upload fails.
                                if (!response || response.error) {
                                    return reject(response && response.error ? response.error.message : genericErrorText);
                                }

                                // If the upload is successful, resolve the upload promise with an object containing
                                // at least the "default" URL, pointing to the image on the server.
                                // This URL will be used to display the image in the content. Learn more in the
                                // UploadAdapter#upload documentation.
                                resolve({
                                    default: response.url
                                });
                            });

                            // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
                            // properties which are used e.g. to display the upload progress bar in the editor
                            // user interface.
                            if (xhr.upload) {
                                xhr.upload.addEventListener('progress', evt => {
                                    if (evt.lengthComputable) {
                                        loader.uploadTotal = evt.total;
                                        loader.uploaded = evt.loaded;
                                    }
                                });
                            }
                        }

                        // Prepares the data and sends the request.
                        _sendRequest(file) {
                            // Prepare the form data.
                            const data = new FormData();

                            data.append('upload', file);

                            // Important note: This is the right place to implement security mechanisms
                            // like authentication and CSRF protection. For instance, you can use
                            // XMLHttpRequest.setRequestHeader() to set the request headers containing
                            // the CSRF token generated earlier by your application.

                            // Send the request.
                            this.xhr.send(data);
                        }
                    }

                    function SimpleUploadAdapterPlugin(editor) {
                        editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                            // Configure the URL to the upload script in your back-end here!
                            return new MyUploadAdapter(loader);
                        };
                    }


                    ClassicEditor
                        .create(document.querySelector('#editor'), {
                            extraPlugins: [SimpleUploadAdapterPlugin],

                            // ...
                        })
                        .catch(error => {
                            console.error(error);
                        });
                </script>

            </div>

            <div class="columns-five my-3">
                @for ($i = 1; $i < 6; $i++)
                    <div>
                        <label class="form-label altona-sans-12" for="tag-{{ $i }}">Tag
                            {{ $i }}</label>
                        <select class="form-select altona-sans-12" name="tag-{{ $i }}"
                            id="tag-{{ $i }}">
                            <option value="">Select Tags</option>
                            @foreach ($tags as $f)
                                <option value="{{ $f->id }}">{{ $f->tag_label }}</option>
                            @endforeach
                        </select>
                    </div>
                @endfor
            </div>

            <div class="d-grid">
                <label class="form-label altona-sans-12" for="table">Insert table (.xlsx)</label>
                <input class="form-control" type="file" name="table" id="table">
            </div>
            <div>
                <label class="form-label altona-sans-12" for="table_caption">Table Caption</label>
                <input class="form-control" type="text" name="table_captions=" id="table_caption">
            </div>
            <hr>

            <div class="d-grid">
                @for ($i = 1; $i < 6; $i++)
                    <div>
                        <label class="form-label altona-sans-12" for="image-{{ $i }}">Image
                            {{ $i }}</label>
                        <input class="form-control" type="file" name="image-{{ $i }}"
                            id="image-{{ $i }}">
                    </div>
                    <div class="my-2">
                        <label class="form-label altona-sans-12" for="caption-{{ $i }}">Caption
                            {{ $i }}</label>
                        <input class="form-control altona-sans-12" type="text" name="caption-{{ $i }}"
                            id="caption-{{ $i }}">
                    </div>
                @endfor
            </div>

            <div class="d-grid">
                <input type="submit" class="btn btn-success mx-auto my-3 btn-lg" value="Add Post">
            </div>
        </form>
    </div>

@endsection
