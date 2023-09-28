@extends('layouts.app')

@section('body')
    <section class="bg-gray pb-5 pt-4">
        <div class="container">
            <div class="mb-5">
                <div class="d-flex align-items-center">
                    <div class="d-flex">
                        <div class="fs-2 fw-bold mb-0 me-2">
                            Answer a Question
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-8 mb-lg-0 mb-5">
                    <div class="card card-discussions mb-5">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('answers.update', $answer->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="answer" class="form-label">Answers</label>
                                        <textarea class="form-control" id="answer" name="answer">{{ $answer->answer ?? old('answer') }}</textarea>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary me-4">Submit</button>
                                        <a href="{{ route('discussions.show', $answer->discussion->slug) }}">Cancel</a>
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
            $('#answer').summernote({
                placeholder: 'Your Solution',
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
