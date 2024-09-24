<form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST"
    onsubmit="return confirm('sicuro di voler eliminare')">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
</form>