@extends('layouts.app')



@section('content')
    <script type="text/javascript" src="instascan.min.js"></script>
    <div class="container">
        <div>
            <h1>Bienvenido al directorio de empresas</h1>
        </div>
        <a href="/home" class="btn btn-info" role="button">Volver</a>
        <button type="button" class="btn btn-primary">Ver mis reservas</button>
        <button type="button" class="btn btn-primary">Ver mi perfil</button>
    </div>
    <div>
        <style>
            #preview{
                width:500px;
                height: 500px;
                margin:0px auto;
            }
        </style>
        <video id="preview"></video>
    </div>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript">
        var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
        scanner.addListener('scan',function(content){

            window.location.href=content;
        });
        Instascan.Camera.getCameras().then(function (cameras){
            if(cameras.length>0){
                scanner.start(cameras[0]);
                $('[name="options"]').on('change',function(){
                    if($(this).val()==1){
                        if(cameras[0]!=""){
                            scanner.start(cameras[0]);
                        }else{
                            alert('No se ha encontrado ninguna cámara frontal');
                        }
                    }else if($(this).val()==2){
                        if(cameras[1]!=""){
                            scanner.start(cameras[1]);
                        }else{
                            alert('No se ha encontrado ninguna cámara trasera');
                        }
                    }
                });
            }else{
                console.error('No se han encontrado cámaras');
                alert('No se han encontrado cámaras');
            }
        }).catch(function(e){
            console.error(e);
            alert(e);
        });
    </script>
    <div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
        <label class="btn btn-primary active">
            <input type="radio" name="options" value="1" autocomplete="off" checked> Cámara frontal
        </label>
        <label class="btn btn-secondary">
            <input type="radio" name="options" value="2" autocomplete="off"> Cámara trasera
        </label>
    </div>
@endsection
