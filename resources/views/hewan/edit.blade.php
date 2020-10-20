@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Data Hewan</div>
            <div class="panel-body">
                <form action="{{ route('hewan.update', $DetailHewan) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                        <label for="">Hewan</label>
                        <select name="id_hewan" id="" class="form-control">
                            @foreach ($hewan as $list)
                                <option value=" {{ $list->id }}"
                                    @if ($list->id === $DetailHewan->id_hewan)
                                        selected
                                    @endif
                                >
                                    {{ $list->hewan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                        <div class="form-group">
                            <label for="">Jenis</label>
                            <input type="text" class="form-control" name="jenis" placeholder="jenis hewan" value="{{ $DetailHewan->jenis }}">
                        </div>
                        <div class="form-group">
                            <label for="">Berat</label>
                            <input type="number" class="form-control" name="berat" placeholder="berat/KG" value="{{ $DetailHewan->berat }}">
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="number" class="form-control" name="harga" placeholder="harga" value="{{ $DetailHewan->harga }}">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Simpan" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection