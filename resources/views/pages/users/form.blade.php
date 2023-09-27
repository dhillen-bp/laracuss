@extends('layouts.app')

@section('body')
    <section class="bg-gray pb-5 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <form action="">
                        <div class="d-flex flex-column flex-md-row mb-4">
                            <div class="edit-avatar-wrapper mb-md-0 mx-md-0 mx-auto mb-3">
                                <div class="avatar-wrapper rounded-circle me-4 flex-shrink-0 overflow-hidden">
                                    <img id="avatar" src="{{ url('assets/images/avatar-white.png') }}" alt="Avatar"
                                        class="avatar">
                                </div>
                                <label for="picture" class="picture edit-avatar-show p-0">
                                    <img src="{{ url('assets/images/edit-circle.png') }}" alt="Edit Circle">
                                </label>
                                <input type="file" name="picture" id="picture" class="d-none" accept="image/*">
                            </div>
                            <div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                    <div class="fs-12px color-gray">Empty this if you don't want to change your
                                        password
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="confirm-password" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm-password"
                                        id="confirm-password">
                                    <div class="fs-12px color-gray">Empty this if you don't want to change your
                                        password
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary me-4">Save</button>
                            <a href="#">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('after-script')
    <script>
        $('#picture').on('change', function(event) {
            var output = $('#avatar');
            output.attr('src', URL.createObjectURL(event.target.files[0]));
            output.onload = function() {
                URL.revokeObjectURL(output.attr('src'))
            }
        })
    </script>
@endsection
