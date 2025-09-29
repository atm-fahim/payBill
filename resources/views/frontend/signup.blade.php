@extends('frontend.index')
@section('content')

    <!-- ========================== SignUp Elements ============================= -->
    <section class="log-space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-md-11">
                    <div class="row no-gutters position-relative log_rads">
                        <div class="col-lg-6 col-md-7 position-static p-4 mx-auto">
                            <div class="log_wraps">
                                <div class="log__heads">
                                    <h4 class="mt-0 logs_title">Create An <span class="theme-cl">Account</span></h4>
                                </div>
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{Session::get('success')}}
                                    </div>
                                @endif
                                <form method="post" action="{{ route('student.signup-new-users') }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Branch*</label>
                                        <select class="form-control" name="branch_id">
                                            <option value="0">--select any one--</option>
                                            @foreach($branch_info as $v_branch)
                                                <option value="{{$v_branch->id}}">{{$v_branch->branch_name}}</option>
                                            @endforeach
                                        </select>
                                        {{--                                        <input onchange="assignStudentInfo(this.value)" name="student_id" type="text" class="form-control empid" value="" required>--}}

                                    </div>
                                    <div class="form-group">
                                        <label>Batch*</label>
                                        <select class="form-control" name="batch_id">
                                            <option value="0">--select any one--</option>
                                            @foreach($batch as $v_batch)
                                                <option value="{{$v_batch->id}}">{{$v_batch->batch_name}}</option>
                                            @endforeach
                                        </select>
                                        {{--                                        <input onchange="assignStudentInfo(this.value)" name="student_id" type="text" class="form-control empid" value="" required>--}}

                                    </div>
                                    <div class="form-group">
                                        <label>Name*</label>
                                        <input name="name" type="text" class="form-control empName" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address*</label>
                                        <input name="email" type="email" class="form-control" value="" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Password*</label>
                                        <input name="password" type="password" class="form-control" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password*</label>
                                        <input name="password_confirmation" type="password" class="form-control"
                                               value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Contact number</label>
                                        <input name="phone_no"  class="form-control phoneNo" type='tel' data-filter='(\+|(\+[1-9])?[0-9]*)' placeholder='+10123'  required />
                                    </div>
                                    <div class="form-group">
                                        <label>Photo (300 X 300)</label>
                                        <input name="image1" type="hidden" class="form-control" value="">
                                        <input name="image" type="file" class="form-control" value="">
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <button style="background-color: #e56131; color:#fff;"
                                                class="btn btn_apply w-100">Sign Up
                                        </button>
                                    </div>
                                </form>
                                <div class="form-group text-center mb-0 mt-3">
                                    Have You Already An Account? <a href="{{route('student.signin')}}" class="theme-cl">LogIn</a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script>
            let inputs = document.querySelectorAll('input[data-filter]');

            for (let input of inputs) {
                let state = {
                    value: input.value,
                    start: input.selectionStart,
                    end: input.selectionEnd,
                    pattern: RegExp('^' + input.dataset.filter + '$')
                };

                input.addEventListener('input', event => {
                    if (state.pattern.test(input.value)) {
                        state.value = input.value;
                    } else {
                        input.value = state.value;
                        input.setSelectionRange(state.start, state.end);
                    }
                });

                input.addEventListener('keydown', event => {
                    state.start = input.selectionStart;
                    state.end = input.selectionEnd;
                });
            }
            function assignStudentInfo(empId) {
                $.ajax({
                    url: "<?= URL::to('frontend/emp-info'); ?>/" + empId,
                    success: function (response) {
                        var obg = JSON.parse(response);
                        if (obg.error == 'assign-student not found') {
                            alert('assign-student not found');
                            $('.empName').val('');
                            $('.phoneNo').val('');
                            $('.empid').val('');
                            return false;
                        } else {
                            $('.empName').val(obg.emp_name);
                            $('.phoneNo').val(obg.phone_no);
                        }
                    }
                });
            }
        </script>
    </section>
    </div>
@endsection
