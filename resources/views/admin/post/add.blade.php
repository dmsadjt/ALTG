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
                            const genericErrorText = `Couldn't upload file: ${file.name}.`;

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

                    CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
                        extraPlugins: [SimpleUploadAdapterPlugin],
                        // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                        toolbar: {
                            items: [
                                'heading', '|',
                                'bold', 'italic', 'strikethrough', 'underline',
                                'removeFormat', '|',
                                'bulletedList', 'numberedList',
                                'outdent', 'indent', '|',
                                'undo', 'redo',
                                'fontSize', '|',
                                'alignment', '|',
                                'link', 'insertImage', 'blockQuote', 'insertTable'
                            ],
                            shouldNotGroupWhenFull: true
                        },
                        // Changing the language of the interface requires loading the language file using the <script> tag.
                        // language: 'es',
                        list: {
                            properties: {
                                styles: true,
                                startIndex: true,
                                reversed: true
                            }
                        },
                        // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                        heading: {
                            options: [{
                                    model: 'paragraph',
                                    title: 'Paragraph',
                                    class: 'ck-heading_paragraph'
                                },
                                {
                                    model: 'heading1',
                                    view: 'h1',
                                    title: 'Heading 1',
                                    class: 'ck-heading_heading1'
                                },
                                {
                                    model: 'heading2',
                                    view: 'h2',
                                    title: 'Heading 2',
                                    class: 'ck-heading_heading2'
                                },
                                {
                                    model: 'heading3',
                                    view: 'h3',
                                    title: 'Heading 3',
                                    class: 'ck-heading_heading3'
                                },
                                {
                                    model: 'heading4',
                                    view: 'h4',
                                    title: 'Heading 4',
                                    class: 'ck-heading_heading4'
                                },
                                {
                                    model: 'heading5',
                                    view: 'h5',
                                    title: 'Heading 5',
                                    class: 'ck-heading_heading5'
                                },
                                {
                                    model: 'heading6',
                                    view: 'h6',
                                    title: 'Heading 6',
                                    class: 'ck-heading_heading6'
                                }
                            ]
                        },
                        // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                        placeholder: 'Welcome to CKEditor 5!',
                        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                        fontFamily: {
                            options: [
                                'default',
                                'Arial, Helvetica, sans-serif',
                                'Courier New, Courier, monospace',
                                'Georgia, serif',
                                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                                'Tahoma, Geneva, sans-serif',
                                'Times New Roman, Times, serif',
                                'Trebuchet MS, Helvetica, sans-serif',
                                'Verdana, Geneva, sans-serif'
                            ],
                            supportAllValues: true
                        },
                        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                        fontSize: {
                            options: [10, 12, 14, 'default', 18, 20, 22],
                            supportAllValues: true
                        },
                        // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                        // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                        htmlSupport: {
                            allow: [{
                                name: /.*/,
                                attributes: true,
                                classes: true,
                                styles: true
                            }]
                        },
                        // Be careful with enabling previews
                        // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                        htmlEmbed: {
                            showPreviews: true
                        },
                        // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                        link: {
                            decorators: {
                                addTargetToExternalLinks: true,
                                defaultProtocol: 'https://',
                                toggleDownloadable: {
                                    mode: 'manual',
                                    label: 'Downloadable',
                                    attributes: {
                                        download: 'file'
                                    }
                                }
                            }
                        },
                        // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                        mention: {
                            feeds: [{
                                marker: '@',
                                feed: [
                                    '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes',
                                    '@chocolate', '@cookie', '@cotton', '@cream',
                                    '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread',
                                    '@gummi', '@ice', '@jelly-o',
                                    '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
                                    '@sesame', '@snaps', '@soufflé',
                                    '@sugar', '@sweet', '@topping', '@wafer'
                                ],
                                minimumCharacters: 1
                            }]
                        },
                        // The "super-build" contains more premium features that require additional configuration, disable them below.
                        // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                        removePlugins: [
                            // These two are commercial, but you can try them out without registering to a trial.
                            'ExportPdf',
                            'ExportWord',
                            'CKBox',
                            'CKFinder',
                            'EasyImage',
                            // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                            // Storing images as Base64 is usually a very bad idea.
                            // Replace it on production website with other solutions:
                            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                            'Base64UploadAdapter',
                            'RealTimeCollaborativeComments',
                            'RealTimeCollaborativeTrackChanges',
                            'RealTimeCollaborativeRevisionHistory',
                            'PresenceList',
                            'Comments',
                            'TrackChanges',
                            'TrackChangesData',
                            'RevisionHistory',
                            'Pagination',
                            'WProofreader',
                            // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                            // from a local file system (file://) - load this site via HTTP server if you enable MathType
                            'MathType'
                        ]
                    });

                    // ClassicEditor
                    //     .create(document.querySelector('#editor'), {
                    //         extraPlugins: [SimpleUploadAdapterPlugin],
                    //         // ...
                    //     })
                    //     .catch(error => {
                    //         console.error(error);
                    //     });
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
