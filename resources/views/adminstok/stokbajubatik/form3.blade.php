{!! Form::model($model, [
    'route' => $model->exists ? ['stokbajubatik.update', $model->id] : 'stokbajubatik.store',
    'method' => $model->exists ? 'PUT' : 'POST', 'files' => 'true'
]) !!}

  <table class="table table-bordered">
    {!! Form::hidden('harga',null,['class'=>'form-control']) !!}
    {!! Form::hidden('kategori',null,['class'=>'form-control']) !!}
    {!! Form::hidden('uk_s',null,['class'=>'form-control']) !!}
    {!! Form::hidden('uk_m',null,['class'=>'form-control']) !!}
    {!! Form::hidden('uk_xl',null,['class'=>'form-control']) !!}
    {!! Form::hidden('bahan',null,['class'=>'form-control']) !!}
    {!! Form::hidden('keterangan',null,['class'=>'form-control']) !!}
    <tr class="form-group">
      <td>Nama Kemeja</td>
      <td>{{ $model->nama_kemeja }}{!! Form::hidden('nama_kemeja',null,['class'=>'form-control']) !!} </td>
    </tr>
    <tr class="form-group">
      <td>Ukuran</td>
      <td>L{!! Form::hidden('uk','L',['class'=>'form-control']) !!}</td>
    </tr>
    <tr class="form-group">
      <td>Stok Awal</td>
      <td>{{ $model->uk_l }}{!! Form::hidden('uk_l',null,['class'=>'form-control']) !!}</td>
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