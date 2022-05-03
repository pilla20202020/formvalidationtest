@extends('layouts.admin.admin')

@section('title', 'Add a New Candidate')

@section('content')
    <section>
        <div class="section-body">
            <form class="form form-validate floating-label" action="{{route('candidate.store')}}" method="POST" enctype="multipart/form-data">
            @include('candidate.form',['header' => 'Add new candidates'])
            </form>
        </div>
    </section>

@endsection

@section('scripts')
@endsection

