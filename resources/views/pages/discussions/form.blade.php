@extends('layouts.app')

@section('body')
    <section class="bg-gray pb-5 pt-4">
        <div class="container">
            <div class="mb-5">
                <div class="d-flex align-items-center">
                    <div class="d-flex">
                        <div class="fs-2 fw-bold mb-0 me-2">
                            Ask a Question
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-8 mb-lg-0 mb-5">
                    <div class="card card-discussions mb-5">
                        <div class="row">
                            <div class="col-12">
                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" autofocus>
                                    </div>
                                    <div class="mb-3">
                                        <label for="category_slug" class="form-label">Category</label>
                                        <select class="form-select" name="category_slug" id="category_slug">
                                            <option value="">Facade</option>
                                            <option value="">Helper</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="content" class="form-label">Question</label>
                                        <textarea class="form-control" id="content" name="content"></textarea>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary me-4">Submit</button>
                                        <a href="#">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('after-script')
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                placeholder: 'The details of your problem | What did you try | What you were expecting',
                tabSize: 2,
                height: 320,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['codeview', 'help']]
                ]
            });

            $('span.note-icon-caret').remove();
        })
    </script>
@endsection
