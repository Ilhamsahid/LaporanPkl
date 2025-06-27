@push('modal')
    @include('components.modals.' . $varName . '-modal', [
        $varName => null,
        'mode' => 'Tambah',
        'route' => route($storeRoute) ?? '',
    ])

    @foreach ($items as $item)
        @include('components.modals.' . $varName . '-modal', [
            'id' => $item->$varName->id ?? $item->id,
            $varName => $item,
            'mode' => 'Edit',
            'route' => route($updateRoute, $item->$varName->id?? $item->id)
        ])

        @include('components.modals.delete', [
            'id' => $item->$varName->id ?? $item->id,
            'nama' => data_get($item, $nama),
            'route' => route($destroyRoute, $item->$varName->id?? $item->id),
        ])
    @endforeach
@endpush
