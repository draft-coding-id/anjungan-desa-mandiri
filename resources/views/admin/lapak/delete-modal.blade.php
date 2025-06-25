<!-- Modal Hapus -->
<div id="deleteModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <div class="modal-title">Konfirmasi Hapus</div>
      <button type="button" class="close" onclick="closeDeleteModal()">&times;</button>
    </div>
    <form id="deleteForm" method="POST">
      @csrf
      @method('DELETE')

      <p>Apakah Anda yakin ingin menghapus lapak ini?</p>

      <div class="button-container">
        <button type="submit" class="btn btn-danger">Hapus</button>
        <button type="button" class="btn btn-secondary" onclick="closeDeleteModal()">Batal</button>
      </div>
    </form>
  </div>
</div>