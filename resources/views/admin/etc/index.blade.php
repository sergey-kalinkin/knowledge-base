@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Синхронизация пользователей из iiko
    </div>

    <div class="card-body">
        <div class="table-responsive">

            <div style="margin-bottom: 10px;">
                <div class="col-lg-12">
                    <form action="{{ route("admin.fresh_users.update") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input class="btn btn-danger" type="submit" value="Синхронизировать">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>

</script>
@endsection
