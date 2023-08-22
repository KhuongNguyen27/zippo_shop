@extends('admin.master')
@section('content')
@include('sweetalert::alert')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <script>
                               function loadDoc(){
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function(){
                                    if (this.readyState ==4 && this.status ==200) {
                                        
                                    }
                                }
                               }
                        </script>
                        <p>asdasdasdasda</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div>
@endsection