<x-layouts.app>
    <x-slot:breadcrumb>
        <li>Beheer</li>
    </x-slot:breadcrumb>

    <h1>Handleiding toevoegen</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('manuals.store') }}" class="mt-4">
        @csrf

        <div class="form-group">
            <label for="brand_id">Merk</label>
            <select id="brand_id" name="brand_id" class="form-control" required>
                <option value="">Kies een merk</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
            @if ($brands->isEmpty())
                <p class="text-danger mt-2">
                    Er zijn nog geen merken beschikbaar. Voer `php artisan db:seed` uit om de standaardmerken toe te voegen.
                </p>
            @endif
        </div>

        <div class="form-group">
            <label for="name">Type / model</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="filesize">Bestandsgrootte (bytes)</label>
            <input id="filesize" type="number" min="0" name="filesize" value="{{ old('filesize') }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="originUrl">URL naar de handleiding</label>
            <input id="originUrl" type="url" name="originUrl" value="{{ old('originUrl') }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="filename">Bestandsnaam</label>
            <input id="filename" type="text" name="filename" value="{{ old('filename') }}" class="form-control" placeholder="Optioneel">
        </div>

        <div class="form-group">
            <label for="downloadedServer">Downloadserver</label>
            <input id="downloadedServer" type="text" name="downloadedServer" value="{{ old('downloadedServer') }}" class="form-control" placeholder="Optioneel">
        </div>

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>

    <h2 class="mt-4">Handleidingen beheren</h2>

    @if ($manuals->isEmpty())
        <p>Er zijn nog geen handleidingen.</p>
    @else
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Merk</th>
                        <th scope="col">Type / model</th>
                        <th scope="col">Actie</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($manuals as $manual)
                        <tr>
                            <td>{{ $manual->brand->name }}</td>
                            <td>{{ $manual->name }}</td>
                            <td>
                                <form method="POST" action="{{ route('manuals.destroy', $manual) }}" onsubmit="return confirm('Weet je zeker dat je deze handleiding wilt verwijderen?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" aria-label="Verwijder {{ $manual->name }}" title="Verwijder handleiding">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                            <path d="M5.5 5.5a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1 0-2H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1M4 4v9a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4zm1.5-2a.5.5 0 0 0-.5.5V3h6v-.5a.5.5 0 0 0-.5-.5z"/>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</x-layouts.app>
