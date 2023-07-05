@extends('layouts.app')

@section('title', 'Personal Note')

@section('css_after')
    <link rel="stylesheet" href="css/quill/quill.snow.css">
@endsection

@section('content')
    <div id="personal_notes" class="bg-white rounded" style="height: 79vh;">
        <div id="editor">
            <div id="editorContent" class="editor-content">
            </div>
        </div>
    </div>
@endsection

@section('js_after')
    <script src="{{ asset('js/quill/quill.min.js') }}"></script>
    <script id="quill_editor">
        var toolbarModules = [
            [{
                header: [1, 2, 3, 4, 5, 6, false]
            }],
            ['bold', 'italic', 'underline', 'strike'],
            [{
                list: 'ordered'
            }, {
                list: 'bullet'
            }],
            ['link', 'image', 'video'],
            ['clean']
        ];

        var quill = new Quill('#editor', {
            modules: {
                toolbar: toolbarModules
            },
            placeholder: 'Write your personal notes here...',
            theme: 'snow'
        });

        var placeholder = document.querySelector('.editor-placeholder');

        quill.on('text-change', function() {
            var content = quill.root.innerHTML;
            localStorage.setItem('quillContent', content);
        });

        var savedContent = localStorage.getItem('quillContent');
        if (savedContent) {
            var delta = quill.clipboard.convert(savedContent);
            quill.setContents(delta, 'api');
        }
    </script>
@endsection
