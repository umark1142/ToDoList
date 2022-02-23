@extends('layouts.app')
@section('content')
{{--    <script type="text/javascript" src="https://MomentJS.com/downloads/moment.js"></script>--}}

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0 text-dark" style="text-align: center">Do List</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title float-end" >
                            <a style="color: white" class="btn bg-success" href="{{route('doList.edit',0)}}">
                                <i class="fas fa-plus"></i>
                                Add Task
                            </a>
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" id="data">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Sr#</th>
                                <th>Task Name</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($result as $key=> $val)
                                    <tr>
                                        <td>{{$key +1}}</td>
                                        <td>{{$val->task}}</td>
                                        <td>{{date("Y-m-d H:i:s", $val->deadline )}}</td>
                                        <td>
                                            <a href="{{ route('doList.edit', $val->id) }}" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a style="color: red" href="{{ route('doList.show', $val->id) }}">
                                                <i class="fas fa-trash"></i>
                                            </a>

                                        </td>
                                    </tr>
                                    @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </section>
    </div>

@endsection
