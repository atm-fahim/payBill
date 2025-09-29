@extends('layouts.app')

@section('content')
    <div class="container card border-top border-0 border-4 border-primary">
        <div class="row justify-content-center">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form method="POST" action="{{ route('sms-send-text') }}"
                  enctype="multipart/form-data">
                @csrf
                <div class="row mb-6" style="margin-top: 10px;">
                    <label for="branch"
                           class="col-md-2 col-form-label text-md-end">{{ __('Number') }}</label>
                    <div class="col-md-10">
                        <input name="id" type="hidden" class="id" value="">
                        <input name="organization_id" type="hidden" class="organization_id" value="1">
                        <input style="border: 1px solid #c9c9;" type="text" class="form-control" name="number"
                               value="">
                    </div>
                </div>
                <div class="row mb-12" style="margin-top: 10px;">
                    <label for="phone_number"
                           class="col-md-2 col-form-label text-md-end">{{ __('Message') }}</label>
                    <div class="col-md-10">
                        <textarea style="border: 1px solid #c9c9;" id="answer"  style="height: 100px;"  name="message" class="form-control answer"></textarea>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <div class="modal-footer">
                            <button type="submit"
                                    class="btn btn-primary submit"> {{ __('Send') }}</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr/>
{{--            <div class="col-lg-12">--}}
{{--                <table id="example" class="table table-striped" style="width:100%">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th>SL</th>--}}
{{--                        <th>Question</th>--}}
{{--                        <th>Answer</th>--}}
{{--                        <th>Action</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}

{{--                    </tbody>--}}
{{--                    <tfoot>--}}

{{--                    </tfoot>--}}
{{--                </table>--}}
{{--            </div>--}}
            <!-- Button trigger modal -->
            <!-- Modal -->



        </div>
    </div>
    <script src="{{asset('editor/tiny_mce.js')}}"></script>
    <script>
        tinymce.init({
            selector: ".answer",
        });

    </script>

@endsection
