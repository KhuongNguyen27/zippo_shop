<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Manager</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('Admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('Admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.3.min.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <style>

    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;

    }

    .pagination-list {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .pagination-link {
        display: block;
        padding: 10px;
        margin: 0 5px;
        border-radius: 4px;
        text-decoration: none;
        color: #333;
        background-color: #fff;
        border: 1px solid #ccc;
        transition: all 0.3s ease;
    }

    .pagination-link:hover {
        background-color: #f7f7f7;
    }

    .pagination-link.is-current {
        background-color: #3273dc;
        color: #fff;
        border-color: #3273dc;
    }

    .pagination-ellipsis {
        margin: 0 5px;
        font-size: 20px;
    }
    </style>
</head>