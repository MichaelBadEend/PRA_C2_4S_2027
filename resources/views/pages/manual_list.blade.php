<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>


    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand'=>$brand->name]) }}</p>

    <ul class="breadcrumb">
        <h2>{{ __('misc.top_5_popular_manuals') }}</h2>
    </ul>
    <ul class="top5manuals" style="list-style: none;">
        @foreach ($popularManuals as $manual)
            <li>
                {{ $loop->iteration }}. <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" title="{{ $manual->name }}">{{ $manual->name }}</a>
            </li>
        @endforeach
    </ul>

        @foreach ($manuals as $manual)

          <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" alt="{{ $manual->name }}" title="{{ $manual->name }}">{{ $manual->name }}</a>({{$manual->filesize_human_readable}})

            <br />
        @endforeach

</x-layouts.app>
