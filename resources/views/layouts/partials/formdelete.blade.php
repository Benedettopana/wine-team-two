<form class="d-inline-block" action="{{ route('admin.wines.destroy', $wine) }}" method="post"
  onsubmit="return confirm('Sei securo di voler eliminare {{ $wine?->wine }} ?')">
  @csrf
  @method('DELETE')

  <button type="submit" class="btn btn-danger"> <i class="fa-solid fa-trash"></i> </button>
</form>
