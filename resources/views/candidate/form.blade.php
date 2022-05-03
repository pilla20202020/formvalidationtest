@section('page-specific-styles')
    <link href="{{ asset('css/dropify.min.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet"
        href="{{ asset('resources/css/theme-default/libs/bootstrap-tagsinput/bootstrap-tagsinput.css?1424887862') }}" />
@endsection
@csrf
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-underline">
                <div class="card-head">
                    <header class="ml-3 mt-2">{!! $header !!}</header>
                </div>
                <div class="card-body">
                    <div class="tab-pane p-3" id="education" role="tabpanel">
                        <div id="additernary" >
                            <div class="form-group row d-flex align-items-end">
                                <div class="col-sm-3 pt-3">
                                    <label class="control-label">First Name</label>
                                    <input type="text" name="firstname" placeholder="Enter a First Name" class="form-control firstname" required value="{{old('firstname')}}">
                                    <span id="textarea1-error" class="text-danger">
                                        @if(isset($errors) && $errors->has('firstname'))
                                            {{ $errors->first('firstname') }}
                                        @endif
                                    </span>
                                </div>

                                <div class="col-sm-3 pt-3">
                                    <label class="control-label">Last Name</label>
                                    <input type="text" name="lastname"
                                        class="form-control lastname" required placeholder="Enter a Last Name" value="{{old('lastname')}}">
                                    <span id="textarea1-error" class="text-danger">
                                        @if(isset($errors) && $errors->has('lastname'))
                                            {{ $errors->first('lastname') }}
                                        @endif
                                    </span>
                                </div>

                                <div class="col-sm-3 pt-3">
                                    <label class="control-label">Email</label>
                                    <input type="email" name="email"
                                        class="form-control email" required placeholder="Enter a valid e-mail" value="{{old('email')}}">
                                    <span id="textarea1-error" class="text-danger">
                                        @if(isset($errors) && $errors->has('email'))
                                            {{ $errors->first('email') }}
                                        @endif
                                    </span>
                                </div>

                                <div class="col-sm-3 pt-3">
                                    <label class="control-label">Phone</label>
                                    <input type="number" name="phone" class="form-control phone" placeholder="Enter a Phone Number" required value="{{old('phone')}}">
                                    <span id="textarea1-error" class="text-danger">
                                        @if(isset($errors) && $errors->has('phone'))
                                            {{ $errors->first('phone') }}
                                        @endif
                                    </span>
                                </div>

                                <div class="col-sm-3 pt-3">
                                    <label class="control-label">Address</label>
                                    <input type="text" name="address" class="form-control address" placeholder="Enter a Address" required value="{{old('address')}}">
                                    <span id="textarea1-error" class="text-danger">
                                        @if(isset($errors) && $errors->has('address'))
                                            {{ $errors->first('address') }}
                                        @endif
                                    </span>
                                </div>

                                <div class="col-sm-3 pt-3">
                                    <label class="control-label">Nationality</label>
                                    <input type="text" name="nationality" class="form-control nationality" placeholder="Enter a Nationality" required value="{{old('nationality')}}">
                                    <span id="textarea1-error" class="text-danger">
                                        @if(isset($errors) && $errors->has('nationality'))
                                            {{ $errors->first('nationality') }}
                                        @endif
                                    </span>
                                </div>

                                <div class="col-sm-3 pt-3">
                                    <label class="control-label">Date of Birth</label>
                                    <input type="date" name="dob" class="form-control dob" required value="{{old('dob')}}">
                                    <span id="textarea1-error" class="text-danger">
                                        @if(isset($errors) && $errors->has('dob'))
                                            {{ $errors->first('dob') }}
                                        @endif
                                    </span>
                                </div>

                                <div class="col-sm-3 pt-3">
                                    <label class="control-label">Education</label>
                                    <select name="education" class="form-control" style="width: 100%; height:36px;">
                                        <option>Select Qualification</option>
                                        <option value="+2" {{ old('education') == "+2" ? "selected" : "" }}>+2</option>
                                        <option value="bachelor" {{ old('education') == "bachelor" ? "selected" : "" }}>Bachelor</option>
                                    </select>
                                    <span id="textarea1-error" class="text-danger">
                                        @if(isset($errors) && $errors->has('education'))
                                            {{ $errors->first('education') }}
                                        @endif
                                    </span>

                                </div>

                                <div class="col-sm-3 pt-3">
                                    <label class="control-label">Mode of Contact</label>
                                    <select name="mode_of_contact" class="form-control" style="width: 100%; height:36px;">
                                        <option>Select Mode Of Contact</option>
                                        <option value="email" {{ old('mode_of_contact') == "email" ? "selected" : "" }}>Email</option>
                                        <option value="phone" {{ old('mode_of_contact') == "phone" ? "selected" : "" }}>Phone</option>
                                        <option value="none" {{ old('mode_of_contact') == "none" ? "selected" : "" }}>None</option>
                                    </select>
                                    <span id="textarea1-error" class="text-danger">
                                        @if(isset($errors) && $errors->has('mode_of_contact'))
                                            {{ $errors->first('mode_of_contact') }}
                                        @endif
                                    </span>

                                </div>

                                <div class="custom-control custom-radio m-2 pt-2">
                                    <input type="radio" id="customRadio1" name="gender" value="1" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="customRadio1">Male</label>
                                </div>
                                <div class="custom-control custom-radio m-2">
                                    <input type="radio" id="customRadio2" name="gender" value="0" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2">Female</label>
                                </div>

                            </div>
                    </div>
                    <div class="form-group mb-0 row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-info btn-submit">
                                Submit
                            </button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@section('page-specific-scripts')
    <script src="{{ asset('js/form-validation.init.js') }}"></script>

@endsection
