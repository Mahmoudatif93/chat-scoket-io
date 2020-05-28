
@extends('dashboard/require/index_dashboard')
@section('content')


<a href="">@lang('site.dashboard')</a></br>
<a href="#">@lang('site.users')</a></br>
<a href="{{ url('admin/users/create') }}">@lang('site.add_user')</a></br>


<ul>
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li>
            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
        </li>
    @endforeach
</ul>

@endsection