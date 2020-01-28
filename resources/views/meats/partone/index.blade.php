@extends("meats.layout")
@section('meat-content')
<div class="p-3 w-full bg-gray-100 rounded-md">
    <h3 class="text-sm font-medium text-gray-900">
        PART ONE
    </h3>
    <div class="mt-2">
        <div>
            <div class="block p-5 bg-white rounded-md shadow">
                <div class="mt-2">
                    {{-- <part-one :partonedata="{{json_encode($partonedata)}}" :user="{{$user}}"></part-one> --}}
                    @foreach($partonedata as $partone)
                    <details class="border px-2 py-2 m-3" open>
                        <summary class="px-4">
                            <div class="flex text-sm text-gray-600">
                                <div>
                                    <span class="text-lg text-gray-800">
                                        Performance
                                        Dimension
                                    </span>
                                    <p>{{$partone->performance_dimension}}</p>
                                </div>
                                <div>
                                    <span class="text-lg text-gray-800">Weight</span>
                                    <p>{{$partone->weight}}%</p>
                                </div>
                            </div>
                        </summary>
                        <table class="table-auto">
                            <thead>
                                <th class="text-sm">Description</th>
                                <th class="text-sm">Measurement</th>
                                <th class="text-sm">Target Performance</th>
                                <th class="text-sm">Self Assessment</th>
                                <th class="text-sm">Supervisor Assessment</th>
                            </thead>

                            <tbody>
                                @foreach($partone->performance_dimensions as $dimension)
                                    <tr>
                                        <td class="text-sm">{{$dimension->description}}</td>
                                        <td class="text-sm">{{$dimension->measurement}}</td>
                                        <td class="text-center">{{$dimension->target_performance}}</td>
                                        @if($dimension->assessment == null)
                                        <td class="text-center" colspan="2">    
                                            @include("meats.partone.assessment.form")
                                        </td>
                                        @else
                                        <td class="text-center" colspan="2">    
                                            @include("meats.partone.assessment.updateform")
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </details>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
