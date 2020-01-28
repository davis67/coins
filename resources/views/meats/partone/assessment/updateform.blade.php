<form method="post" action="">
    @csrf
    <input type="number" class="w-12 text-center @error('self_assessment{{ $dimension->assessment->performance_metrics_details_id}}{{$dimension->assessment->dimension_id}}') border border-red-500 @enderror border" name="self_assessment{{ $dimension->assessment->performance_metrics_details_id}}{{$dimension->assessment->dimension_id}}" value ="{{$dimension->assessment->self_assessment}}"/>
    <input type="number" class="w-12 text-center @error('supervisor_assessment{{ $dimension->assessment->performance_metrics_details_id}}{{$dimension->assessment->dimension_id}}') border border-red-500 @enderror border" name="supervisor_assessment{{ $dimension->assessment->performance_metrics_details_id}}{{$dimension->assessment->dimension_id}}" value ="{{$dimension->assessment->supervisor_assessment}}" />
    <button type="submit"
        class="bg-green-700 hover:bg-green-800 text-xs px-1 py-1 text-white">Update</button>
</form>