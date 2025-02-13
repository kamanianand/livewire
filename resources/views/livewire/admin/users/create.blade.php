@push('styles')
@endpush

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-8">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Create new user</h4>
                </div>
            </div>
            <div class="col-4">
                <a wire:navigate href="{{ route('admin.users') }}" class="btn btn-primary float-end"> Back</a>
            </div>
        </div>
        <!-- end page title -->
        @include('components.layouts.message')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form wire:submit.prevent="store">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label" for="name">Name <span class="required_sign">*</span></label>
                                    <input type="text" id="name" wire:model="name" class="form-control" placeholder="Enter user name" value="{{ old('name') }}"/>
                                    @error('name')
                                        <strong class="required_message_span">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="email">Email <span class="required_sign">*</span></label>
                                    <input type="text" id="email" wire:model="email" class="form-control" placeholder="Enter user email" value="{{ old('email') }}"/>
                                    @error('email')
                                        <strong class="required_message_span">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="mobile_no">Mobile no <span class="required_sign">*</span></label>
                                    <input type="text" id="mobile_no" wire:model="mobile_no" class="form-control" placeholder="Enter user mobile no" value="{{ old('mobile_no') }}"/>
                                    @error('mobile_no')
                                        <strong class="required_message_span">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="profile_picture">Profile Image </label>
                                    <input type="file" id="profile_picture" wire:model="profile_picture" class="form-control" placeholder="Select file" value=""/>
                                    @error('profile_picture')
                                        <strong class="required_message_span">{{ $message }}</strong>
                                    @enderror
                                </div>
                                <div class="col-md-6 justify-content-end">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Submit</button>
                                    <button type="reset" class="btn btn-label-secondary waves-effect" onclick="cancelbutton();">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
</div>