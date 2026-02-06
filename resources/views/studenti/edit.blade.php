@extends('layouts.app')

@section('title', 'Uredi studenta')
@section('page_title', 'Uredi studenta')
@section('content')

@if($errors->any())
  <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
    <strong>Greške:</strong>
    <ul>
      @foreach($errors->all() as $e)
        <li>{{ $e }}</li>
      @endforeach
    </ul>
  </div>
@endif
<form class="form-box" method="POST" action="{{ route('studenti.update', $studenti) }}">
  @csrf
  @method('PUT')

  <label>Ime</label>
  <input type="text" name="ime" value="{{ old('ime', $studenti->ime) }}">

  <label>Prezime</label>
  <input type="text" name="prezime" value="{{ old('prezime', $studenti->prezime) }}">

  <label>Datum rođenja</label>
  <input type="date" name="datum_rod" value="{{ old('datum_rod', $studenti->datum_rod->format('Y-m-d')) }}">

  <label>MBR</label>
  <input type="number" name="mbr" value="{{ old('mbr', $studenti->mbr) }}">

  <label>Stipendija</label>
  <input type="number" step="0.01" name="stipendija" value="{{ old('stipendija', $studenti->stipendija) }}">

  <label>Mjesto (može biti prazno)</label>
  <input type="text" name="mjesto" value="{{ old('mjesto', $studenti->mjesto) }}">

  <label>Fakultet</label>
  <select name="fakultetid" style="width: 80%; padding: 8px; margin-top: 5px;">
    @foreach($fakulteti as $f)
      <option value="{{ $f->id }}" @selected(old('fakultetid', $studenti->fakultetid) == $f->id)>
        {{ $f->naziv }} ({{ $f->mjesto }})
      </option>
    @endforeach
  </select>

  <button type="submit">Spremi</button>
</form>
@endsection
