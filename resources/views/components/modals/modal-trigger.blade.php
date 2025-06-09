@push('modal')
    @include('components.modals.' . $varName . '-modal', [
        $varName => null,
        'mode' => 'Tambah',
        'route' => route($storeRoute) ?? '',
    ])

    @foreach ($items as $item)
        @include('components.modals.' . $varName . '-modal', [
            'id' => $item->id,
            $varName => $item,
            'mode' => 'Edit',
            'route' => route($updateRoute, $item->id) ?? '',
        ])

        @include('components.modals.delete', [
            'id' => $item->id,
            'nama' => data_get($item, $nama),
            'route' => route($destroyRoute, $item->id),
        ])
    @endforeach
@endpush
