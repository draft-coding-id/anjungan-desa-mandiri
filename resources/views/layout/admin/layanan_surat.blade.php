@extends('layout.admin.app')

@section('additional-styles')
<style>
    .menu-surat {
        padding: 0 50px;
        display: flex;
        align-items: center;
        border-bottom: 2px solid #333;
    }

    .menu-surat a {
        border: 1px solid #f4f4f4;
        padding: 7px 20px;
        cursor: pointer;
        color: #333;
        border-radius: 0px;
        background-color: #f4f4f4;
        text-decoration: none;
        font-size: 14px;
        letter-spacing: 0.5px;
    }

    .menu-surat a:hover {
        background-color: #f4f4f4;
        border-radius: 10px 10px 0px 0px;
        border: 1px solid #FFA500;
        color: #FFA500;
    }

    .menu-surat a.active {
        background-color: #FF8A00;
        border: 1px solid #FF8A00;
        border-radius: 10px 10px 0px 0px;
        color: white;
        font-weight: bold;
    }

    .content-1 {
        width: 50%;
        padding: 30px 50px;
    }

    .content-2 {
        flex-grow: 1;
        width: 50%;
        padding: 50px 50px;
    }

    .preview-container {
        margin: auto;
        border: 1px solid #ddd;
        padding: 10px;
        width: 100%;
        height: 500px;
    }

    .button-container {
        text-align: center;
        margin: 50px;
    }

    .template-pesan {
        border: 2px solid #000000;
        border-radius: 20px;
        padding: 8px;
        display: flex;
        width: 100%;
        color: #a7a7a7;
    }

    .footer {
        bottom: 0;
        width: 100%;
        color: white;
        text-align: center;
        background-color: #ff9900;
    }

    .footer-content {
        padding: 10px 0px 40px 0px;
    }

    .footer-content button {
        border: 3px solid #ffffff;
        padding: 20px 30px;
        font-size: 18px;
        font-weight: bold;
        background-color: #ffffff;
        color: #ff9900;
    }

    .footer-content button:hover {
        background-color: #e68a00;
        color: #ffffff;
    }

    .container-send-pesan {
        display: flex;
        justify-content: start;
        align-items: center;
        margin: 20px;
    }

    .container-send-pesan>span {
        margin-right: 10px;
    }

    @media (max-width: 768px) {

        .content-1,
        .content-2 {
            width: 100%;
            padding: 20px;
        }

        .preview-container {
            margin: 10px;
            padding: 15px;
        }
    }
</style>
@endsection