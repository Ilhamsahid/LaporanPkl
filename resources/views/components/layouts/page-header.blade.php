<div class="card-header">
    <div>
        <h3 class="card-title">{{ $judul }}</h3>
        <p class="card-subtitle">{{ $deskripsi }}</p>
    </div>
    <div style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
        <div class="search-input">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="form-input" placeholder="Cari {{ $nama }}..." style="width: 250px;">
        </div>
        <button class="btn btn-primary" onclick="openModal('{{ $name_modal }}')">
            <i class="fas fa-plus"></i>
            <span>Tambah {{ $nama }}</span>
        </button>
    </div>
</div>
