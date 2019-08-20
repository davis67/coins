@extends('layouts.app')
    @section('content')
    <div class="row">
            <!-- Column -->
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title  pull-left text-uppercase m-b-25">{{$leave->leavesetting->leave_type}} LEAVE</h4>
                  <ul class="nav nav-pills custom-pills pull-right m-t-0 m-b-30">
                    <li class="nav-item"> <a href="#navpills-3" class="nav-link btn bg-primary text-white" data-toggle="tab" aria-expanded="true">Back</a> </li>
                  </ul>
                  <div class="clearfix"></div>
                  <div class="tab-content br-n pn">
                    <div id="navpills-11" class="tab-pane active">
                      <div class="row">
                        <div class="col-md-12">
                          <h6 class="card-subtitle alert alert-primary m-b-40">Each consultant can get a maximum of 21 days of annual leave and not a once.One can get atmost of 14days of annual  leave at once.</h6>
                          <div class="timeline-centered">
                                @foreach($leave->leaveactivities as $leaveactivity)

                            <h6 class="text-primary m-b-20">Start Date:{{\Carbon\Carbon::parse($leaveactivity->leave->leave_start, 'EAT')}}, {{$leave->financialyear->year}}</h6>
                            <article class="timeline-entry">
                              <div class="timeline-entry-inner">
                              <div class="time-line-time ml-0">{{$leaveactivity->leave->duration}} days</div>
                                <div class="timeline-icon"> <i class="entypo-feather"></i> </div>
                                <div class="timeline-label p-b-0">
                                  <div class="members-projects inline-block">
                                    <h2 class="m-t-5 p-4">{{$leaveactivity->leave->leave_detail}}</h2>
                                  </div>
                                </div>
                               
                              </div>
                            </article>
                            
                            <h6 class="text-primary m-b-20">End Date:{{\Carbon\Carbon::create($leaveactivity->leave->leave_end, 'EAT')}}</h6>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>  
    @endsection