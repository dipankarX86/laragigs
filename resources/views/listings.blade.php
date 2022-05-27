<h1>{{ $heading }}</h1>

{{-- @php
    $test = 1;
@endphp
{{ $test }} --}}

{{-- @if (count($listings) == 0)
    <p>no listings here</p>
@endif --}}

@unless (count($listings) == 0)
    @foreach($listings as $listing)
        <h2>
            <a href="/listings/{{ $listing['id'] }}">{{ $listing['title'] }}</a>
        </h2>
        <p>{{ $listing['description'] }}</p>
    @endforeach
@else
    <p>No Listings Found</p>
@endunless
