<form method="post" action="{{route("partone.store", [$user->id,$partone->id,$dimension->id])}}">
    @csrf
    <input type="number" class="w-12 text-center border" name="self_assessment{{ $partone->id}}{{$dimension->id}}" value ="{{old("self_assessment".$partone->id.$dimension->id)}}"/>
    <input type="hidden" name="user_id" value="{{$user->id}}" />
    <input type="hidden" name="performance_metrics_id"
        value="{{$dimension->id}}" />
    <input type="hidden" name="dimension_id" value="{{$dimension->id}}" />
    <input type="number" class="w-12 text-center border" name="{{ "supervisor_assessment".$partone->id.$dimension->id}}" value ="{{old("supervisor_assessment".$partone->id.$dimension->id)}}" />
    <button type="submit"
        class="bg-red-800 hover:bg-red-600 text-xs px-1 py-1 text-white">Add</button>
</form>