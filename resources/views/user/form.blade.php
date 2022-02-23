@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-3"></div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center text-muted">{{ ($id > 0 ? 'Edit' : 'Add') }} Buy Grocery For Home</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form class="row g-3" action="{{$action}}" method="POST">
                                @csrf
                                <input type="hidden" value="PUT" name="_method">
                                <div class="col-md-12">
                                    <label class="form-label">Task Name</label>
                                    <input type="text" name="task" value="{{ old('task', $doList->task) }}" required autofocus placeholder="Enter the task name" title="Enter the task name" class="form-control" >
                                    @error('task')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label  class="form-label">Deadline</label>
                                    <input type="datetime-local" min="{{date('Y-m-d\TH:i')}}" name="deadline" value="{{ old('deadline', $doList->deadline) }}" autofocus placeholder="Enter the deadline date" title="Enter the deadline date" class="form-control" >
                                    @error('deadline')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">{{ ($id > 0 ? 'Update' : 'Submit') }}</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-3 col-lg-3"></div>
        </div>
    </div>
{{--    <script type="text/javascript" src="https://MomentJS.com/downloads/moment.js"></script>--}}
{{--    <script>--}}
{{--        let a =  moment().valueOf();--}}
{{--        console.log(a);--}}
{{--    </script>--}}

@endsection
