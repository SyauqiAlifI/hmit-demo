<div style="max-w: 500px; margin: 50px auto; font-family: sans-serif;">
  <h2>Edit Aspirasi</h2>

  <form action="{{ route('aspirasi.user.update', $aspirasi->id) }}" method="POST"
    style="display: flex; flex-direction: column; gap: 15px;">
    @csrf
    @method('PUT')

    <div>
      <label>Pesan / Aspirasi</label><br>
      <textarea name="message" rows="5" required style="width: 100%;">{{ old('message', $aspirasi->message) }}</textarea>
      @error('message')
        <div style="color: red;">{{ $message }}</div>
      @enderror
    </div>

    <button type="submit" style="background: blue; color: white; padding: 10px; border: none;">Simpan Perubahan</button>
    <a href="{{ route('aspirasi.user.mine') }}">Batal</a>
  </form>
</div>
