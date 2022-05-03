@if(!empty($editRoute))
    <a href="{{$editRoute}}"><button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Edit"><i class="mdi mdi-pencil"></i></button></a>
@endif

@if(!empty($printRoute))
    <a href="{{$printRoute}}" target="_blank"><button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Print"><i class="mdi mdi-printer"></i></button></a>
@endif

@if(!empty($viewRoute))
    <a href="{{$viewRoute}}"><button type="button" class="btn btn-icon-toggle " data-toggle="tooltip"  data-placement="top" data-original-title="View"><i class="far fa-eye"></i></button></a>
@endif

{{-- @if(!empty($showRoute))
    <a href="{{$showRoute}}"><button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Show"><i class="far fa-eye"></i></button></a>
@endif --}}

@if(!empty($deleteRoute))
    <a href="{{$deleteRoute}}"><button type="button" class="btn btn-icon-toggle " data-toggle="tooltip" id="sa-warning" data-placement="top" data-original-title="Delete"><i class="far fa-trash-alt"></i></button></a>
@endif

@if(!empty($approveList))
<button type="button" class="btn btn-primary btn-approve btn-sm" onclick="approvedthis({{$approveList}})" value="1">Approve</button>
@endif

@if(!empty($rejectList))
    <button type="button" class="btn btn-danger btn-reject btn-sm"  onclick="rejectthis({{$rejectList}})">Reject</button>
@endif




