@extends('layouts.app')

@section('content')

<style>
    a {
        text-decoration: none;
    }
</style>

<div class="container-fluid"
    x-init="fetchFolders()"
    x-data="folderComponent">

    <div class="row p-2">
        <template x-for="folder in folders">
            <div class="col-lg-3 col-6">
                <a :href="'/folders/' + folder.id">
                    <div class="small-box bg-warning h-100" >
                        <div class="inner">
                            <h4 x-text="folder.name"></h6>
                            <p >44 Senhas</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-folder-open"></i>
                        </div>
                    </div>
                </a>
            </div>
        </template>
    </div>

</div>

<script>
    const folderComponent = {
        folders: [],


        fetchFolders() {
            axios.get('{{ route("folders.fetch") }}')
                .then(response => this.folders = response.data.data)
        }
    }
</script>

    {{-- <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Folders</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right" href="{{ route('folders.create') }}">
                        Add New
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('folders.table')

                <div class="card-footer clearfix">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div> --}}
@endsection
