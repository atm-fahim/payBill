@extends('layouts.app')
@section('content')
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">

</div>
{{--    --}}
    <script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>
    <script>
        $(function (){
            $.ajax({
                url: "<?= URL::to('/dashboard-total-count-log'); ?>/",
                type: 'get',
                data:{},
                dataType: 'JSON',
                success: function (response) {
                $('.total_course').text(response.totalCourse);
                $('.total_lesson').text(response.totalLesson);
                $('.total_course_enrolled').text(response.totalCourseEnrolled);
                $('.total_student').text(response.totalStudent);
                $('.total_pass').text(response.totalPass);
                $('.total_fail').text(response.totalFail);
                $('.total_final_exam').text(response.totalFailExam);
                $('.total_mock_test').text(response.totalMockTest);
                }
            });
        });
    </script>
@endsection
