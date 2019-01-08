{!! Form::model($model, [
    'route' => $model->exists ? ['stokkain.update', $model->id] : 'stokkain.store',
    'method' => $model->exists ? 'PUT' : 'POST', 'files' => 'true'
]) !!}

  <table class="table table-bordered">
    {!! Form::hidden('tipe', null, ['class' => 'form-control', 'id' => 'tipe']) !!}
    {!! Form::hidden('supplier', null, ['class' => 'form-control', 'id' => 'supplier']) !!}
    <tr class="form-group">
      <td>Nama Kain</td>
      <td>{{ $model->nama_kain }}{!! Form::hidden('nama_kain', null, ['class' => 'form-control', 'id' => 'nama_kain']) !!}</td>
    </tr>
    <tr class="form-group">
      <td>Stok Awal</td>
      <td>{{ $model->stok }}{!! Form::hidden('stok', null, ['class' => 'form-control', 'id' => 'stok']) !!}</td>
    </tr>
    <tr class="form-group">
      <td>Stok Masuk</td>
      <td>{!! Form::number('masuk', 0, ['class' => 'form-control', 'id' => 'masuk', 'min'=>'0']) !!}</td>
    </tr>
    <tr class="form-group">
      <td>Stok Keluar</td>
      <td>{!! Form::number('keluar', 0, ['class' => 'form-control', 'id' => 'keluar', 'min'=>'0']) !!}</td>
    </tr>
  </table>

{!! Form::close() !!}

