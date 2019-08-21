@extends('layouts.app')
    @section('content')
        <div class="card">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">leaves</li>
                    </ol>
                </nav>
                <div class="container-fluid p-0">
                    <form method="post" action="{{route('leaves.store')}}">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12">
                                <label>Leave Status</label>
                                <select class="form-control" name="the_leavesetting">
                                   <option value="" >Choose...</option>
                                   <option value="Accept">Accept</option>
                                   <option value="Decline">Decline</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label>Comments</label>
                                <textarea type="text" name="leave_detail" id="leave_detail" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <button type="submit" class="btn btn-outline-primary btn-sm">Submit</button>
                        </div>
                     </form> 
                </div>
            </div>
        </div>
        
    @endsection