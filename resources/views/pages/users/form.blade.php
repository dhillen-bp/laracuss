@extends('layouts.app')

@section('body')
    <section class="bg-gray pb-5 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <form action="{{ route('users.update', $user->username) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="d-flex flex-column flex-md-row mb-4">
                            <div class="edit-avatar-wrapper mb-md-0 mx-md-0 mx-auto mb-3">
                                <div class="avatar-wrapper rounded-circle me-4 flex-shrink-0 overflow-hidden">
                                    <img id="avatar" src="{{ $picture }}" alt="Avatar" class="avatar">
                                </div>
                                <label for="picture" class="picture edit-avatar-show p-0">
                                    <img src="{{ url('assets/images/edit-circle.png') }}" alt="Edit Circle">
                                </label>
                                <input type="file" name="picture" id="picture" class="d-none" accept="image/*">
                            </div>
                            <div>
                                @error('picture')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        name="username" id="username" value="{{ old('username', $user->username) }}"
                                        autofocus>
                                    @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" id="password">
                                    <div class="fs-12px color-gray">Empty this if you don't want to change your
                                        password
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" id="password_confirmation">
                                    <div class="fs-12px color-gray">Empty this if you don't want to change your
                                        password
                                    </div>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary me-4">Save</button>
                            <a href="{{ route('users.show', $user->username) }}">Cancel</a>
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
